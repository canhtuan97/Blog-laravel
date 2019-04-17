<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Repositories\UserRepository;

class PostRepository extends EloquentRepository
{
	public function model()
	{
		return \App\Post::class;
	}	
	//get info a question
	public function getQuestion(){
		$questions = $this->model->where('kind_id',2)->get();
		return $questions;
	}
	// get info a post
	public function getPost()
	{
	
		$posts = $this->model->where('kind_id',1)->paginate(5);

		return $posts;
	}
	// get info a Top
	public function getTop(){
		//
		$tops = $this->model->groupBy('user_id')
			->selectRaw('sum(`like`) as `sum`, `user_id`')
			->pluck('sum','user_id');

			//
		$temps =[];
		$userRepository = new UserRepository;
		foreach ($tops as $user_id => $sum) {
			$user = $userRepository->find($user_id);
			$temps[$user->username] = $sum;
		}
		$tops = $temps;
		//

		return $tops;
	}
	public function getTopLike(){
		$tops = $this->model->groupBy('user_id')
			->selectRaw('sum(`like`) as `sum`, `user_id`')
			->pluck('sum','user_id');

			//
		$temps =[];
		$max  = 0;
		$userRepository = new UserRepository;
		foreach ($tops as $user_id => $sum) {
			$user = $userRepository->find($user_id);
			$temps[$user->email] = $sum;
			if ($max < $sum) {
				$max = $sum;
				$email = $user->email;
			}
		}
		//$tops = $temps;
		$top[] = [$email,$sum];
		return $top;
	}
	// add a post and quétion
	public function addWrite($request,$tagname){
		
    	$this->model->insert([
    		'user_id'=>$request->user_id,
    		'tieude'=>$request->tieude,
    		'tagname'=>$tagname,
    		'body'=>$request->body,
    		'like'=>$request->like,
    		'kind_id'=>$request->kind
    	]);

	}

	// get all possts
	public function getAllPost(){
		$posts = $this->model->paginate(3);
		return $posts;
	}
	// get a post with ID
	public function getAllPostId($user){
		$posts = $this->model->where('user_id',$user)->get();
		return $posts;
	}
	//delete a post
	public function deletePostId($id){
		$this->model->where('id', '=', $id)->delete();
	}
	// update a possts
	public function updateWrite($request){
		$this->model
            ->where('id', $request->id )
            ->update(['tieude' => $request->tieude,
                      'tag_id' => $request->tag_id,
                      'body' =>$request->body
        ]);;
	}
	// like
	public function like($like,$id){
   	$like = $like +1;
   	$this->model
            ->where('id', $id)
            ->update(['like' => $like
            		  
        ]);;
   }

}