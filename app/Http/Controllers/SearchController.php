<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\Repositories\PostRepository;
use App\Repositories\TagRepository;
class SearchController extends Controller
{	
	private $postRepository;
    private $tagRepository;
    public  function __construct(PostRepository $postRepository,TagRepository $tagRepository ){
      $this->postRepository  = $postRepository;
      $this->tagRepository  = $tagRepository;
    }
	/**
	 * 
	 * @return view('Search')
	 */
	public function getFind(){
		return view('Search');
	}
	/**
	 * Find in database all post have value = $key and variable transmission $post to view Search display all result 
	 * @param  Request
	 * @return view('Search',['post'=>$post,'key'=>$key]);
	 */
    public function find(Request $request){
    	$key = $request->key;
    	
    	if ($key != null) {
    		$post = post::where('tieude','like',"%$key%")->orWhere('body','like',"%$key%")->orWhere('tagname','like',"%$key%")->paginate(3);
    	
    		return view('Search',['post'=>$post,'key'=>$key]);
    	}return redirect()->route('/');

    	
    	
    }	
    public function timKiem(Request $request){
        $key = $request->tagname;
        $post = post::where('tieude','like',"%$key%")->orWhere('body','like',"%$key%")->orWhere('tagname','like',"%$key%")->paginate(3);
		return view('Search',['post'=>$post,'key'=>$key]);
	}
}
