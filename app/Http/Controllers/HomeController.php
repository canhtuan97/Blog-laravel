<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\comment;
use Illuminate\Support\Facades\DB;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
class HomeController extends Controller
{
	private $postRepository;
	private $commentRepository;

	public  function __construct(PostRepository $postRepository,CommentRepository $commentRepository){
		$this->postRepository  = $postRepository;
		$this->commentRepository  = $commentRepository;
	}
	/**
	 * [home display interface for user]
	 * @return [type] [send a variable posts  questions  to view welcome]
	 */
	public function home(){
		$questions = $this->postRepository->getQuestion();
		$posts = $this->postRepository->getPost();
		$tops = $this->postRepository->getTop();
		
	    return view('welcome',['questions'=>$questions,'posts'=>$posts,'tops'=>$tops]);
	}
	/**
	 * [showDetailsPost display details a post]
	 * @param  Post   $id [receive a variable when click see post ]
	 * @return [type]     [send variable $id is a array info a post to view show/show_details_post]
	 */
	public function showDetailsPost(Post $id){
		$idCm = $id->id;

		
		$comments = $this->commentRepository->getCommentId($idCm);
		
		return view('show/show_details_post',['id'=>$id,'comments'=>$comments]);
	}
	/**
	 * [showDetailsQuestion display details a questions]
	 * @param  Post   $id [receive a variable when click see questions ]
	 * @return [type]     [send variable $id is a array info a questions to view show/show_details_question]
	 */
	public function showDetailsQuestion(Post $id){
		$idCm = $id->id;
		
		$comments = $this->commentRepository->getCommentId($idCm);
		return view('show/show_details_question',['id'=>$id,'comments'=>$comments]);
	}
	/**
	 * [addComment add a comment in database ]
	 * @param Request $request [a array info of new post ]
	 */
	public function addComment(Request $request){
		$this->commentRepository->addComment($request);
		return back();
	}
	/**
	 * [like augment a like when click button like]
	 * @param  Request $request [receive a variable type array info a new posts]
	 * @return [OderRequest $request] [when like complete back page old]
	 */
	public function like(Request $request){
		$id = $request->id;
		$like = $request->like;
		$this->postRepository->like($like,$id);
		return back();
	}
	/**
	 * [listPost display all Post]
	 * @return [null] [send a variable $posts is a array to view show/list_post ]
	 */
	public function listPost(){
		$posts = $this->postRepository->getPost();
		return view('show/list_post',['posts'=>$posts]);
	}
	/**
	 * [listquestion display all question]
	 * @return [array] [send a variable $posts is a array to view show/list_question]
	 */
	public function listquestion(){
		$posts = $this->postRepository->getQuestion();
		return view('show/list_question',['posts'=>$posts]);
	}
}
