<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tag;
use App\post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
class WriteControllers extends Controller
{
    private $postRepository;
    private $tagRepository;
    public  function __construct(PostRepository $postRepository,TagRepository $tagRepository ){
      $this->postRepository  = $postRepository;
      $this->tagRepository  = $tagRepository;
    }

    /**
     * [get display form write post]
     * @return [type] [send a variable tag to view user/write/write ]
     */
	public function get(){
	   $tag = $this->tagRepository->getTag();
        
		return view('user/write/write',['tag'=>$tag]);
	}
    /**
     * [post add new a post in database ]
     * @param  Request $request [receive a variable have info of a post]
     * @return [type]           [redirect()->route('managerpost') when complete]
     */
    public function post(Request $request){
        $tagname = implode(',',$request->tagname);   
        $this->postRepository->addWrite($request,$tagname);
    	return redirect()->route('managerpost');
    }
    /**
     * [managerPost dissplay manage all post of a user]
     * @return [type] [send a variable post have info all post in table posts to view user/write/manager_post]
     */
    public function managerPost(){
        $user = Auth::user();
        $user = $user->id;
        $posts = $this->postRepository->getAllPostId($user);
        // dd($posts)
        return view('user/write/manager_post',['post'=>$posts]);
    }

    /**
     * [questionGet display form write question ]
     * @return [type] [send a variable tag to view user/write/Question]
     */
    public function questionGet(){
        $tag = $this->tagRepository->getTag();
        return view('user/write/Question',['tag'=>$tag]);
    }
    /**
     * [questionPost add new a question in database]
     * @param  Request $request [receive a variable have info of a question]
     * @return [type]           [redirect()->route('managerpost') when complete]
     */
    public function questionPost(Request $request){
        $tagname = implode(',',$request->tagname);   
        $this->postRepository->addWrite($request,$tagname);
        return redirect()->route('managerpost');
    }
    /**
     * [editGetPost display form edit post]
     * @param  Post   $id [receive a variable have info a post old]
     * @return [type]     [send all info of a post old to view user/write/edit/edit_post ]
     */
    public function editGetPost(Post $id){
        $tag = $this->tagRepository->getTag();
        $user = Auth::user();
        if ($user->id ==$id->user_id) {
             return view('user/write/edit/edit_post',['id'=>$id,'tag'=>$tag]);
        }else{
            return redirect()->route('getUser');
        }
    }
    /**
     * [editGetQuestion diplay form question]
     * @param  Post   $id [receive a variable have info a post old]
     * @return [type]     [send all info of a question old to view user/write/edit/edit_question ]
     */
    public function editGetQuestion(Post $id){
        $tag = $this->tagRepository->getTag();
        $user = Auth::user();
        
        if ($user->id ==$id->user_id) {
           return view('user/write/edit/edit_question',['id'=>$id,'tag'=>$tag]);
        }else{
            return redirect()->route('getUser');
        }
    }
    /**
     * [updatePost update change post]
     * @param  Request $request [receive a variable have info of post old when change ]
     * @return [type]           [redirect()->route('managerpost'); when complete]
     */
    public function updatePost(Request $request){
        $this->postRepository->updateWrite($request);
        return redirect()->route('managerpost');
    }
    /**
     * [updateQuestion update change question]
     * @param  Request $request [receive a variable have info of question old when change]
     * @return [type]           [redirect()->route('managerpost') when complete]
     */
    public function updateQuestion(Request $request){
        
        $this->postRepository->updateWrite($request);
        return redirect()->route('managerpost');
    }
    /**
     * [deleteAndEdit handing when click button edit or delete]
     * @param  Request $request [receive a variable ]
     * @return [type]   [redirect to route delete or edit ]
     */
    public function deleteAndEdit(Request $request){

        $action = $request->action;
        $id = $request->id;
        $kind_id = $request->kind_id;
        $user = $request->user_id;
        if ($action=='delete') {
           $this->postRepository->deletePostId($id);
           return redirect()->route('managerpost');
        }else{
            if ($action=='edit') {
                if ($kind_id == 1) {
                    
                    return redirect()->route('edit.get.post',['id'=>$id]);
                }else{
                    return redirect()->route('edit.get.question',['id'=>$id]);
                }
                
            }
        }

    }
}
