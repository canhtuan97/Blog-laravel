<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Repositories\CommentRepository;
class AdminControllers extends Controller
{
    private $postRepository;
    private $userRepository;
    private $commentRepository;
    public  function __construct(PostRepository $postRepository,UserRepository $userRepository,CommentRepository $commentRepository ){
        $this->postRepository  = $postRepository;
        $this->userRepository  = $userRepository;
        $this->commentRepository  = $commentRepository;
    }
    /**
     * [getAdminPost get all data in table post]
     * @return [type] [view and send a variable posts is a array to view admin/manager_admin_post ]
     */
    public function getAdminPost(){
    	$posts = $this->postRepository->getAllPost();
    	return view('admin/manager_admin_post',['posts'=>$posts]);
    }
    /**
     * [deleteAdminPost delete a post]
     * @param  Request $request [click button delete]
     * @return [type]           [when delete complete back page old]
     */
    public function deleteAdminPost(Request $request){
        $id = $request->id;
    	$this->postRepository->deletePostId($id);
    	return back();

    }
    /**
     * [getAdminUser get all user in database ]
     * @return [type] [send a variable $user is a array to view admin/manager_admin_user  ]
     */
    public function getAdminUser(){
    	$users = $this->userRepository->getAllUser();
    	return view('admin/manager_admin_user',['users'=>$users]);
    }
    /**
     * [deleteAdminUser description]
     * @param  Request $request [click button delete user ]
     * @return [type]           [when delete complete back page old]
     */
    public function deleteAdminUser(Request $request){
    	   $id = $request->id;
           $this->userRepository->deleteUserId($id);
            return back();

    }
    /**
     * [adminDetailsPost display details posts]
     * @param  Post   $id [receive a variable is a array info of a post]
     * @return [type]     [display view details posts]
     */
    public function adminDetailsPost(Post $id){
        $idCm = $id->id;

        
        $comments = $this->commentRepository->getCommentId($idCm);

        return view('admin/manager_admin_details_post',['id'=>$id,'comments'=>$comments]);
    }
    /**
     * [adminDeleteComment when click button delete comment]
     * @param  Request $request []
     * @return [type]           [when delete complete back page old]
     */
    public function adminDeleteComment(Request $request){
        $id = $request->id;
        $this->commentRepository->deleteCommentId($id);
        return back();
    }

    //hiển thị form mail
    public function getMail(){
        return view('admin/send_mail');
    }
}
