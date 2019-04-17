<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class CommentRepository extends EloquentRepository
{
    public function model()
   {
       return \App\Comment::class;
   }	
   // get comment with id of posst
   public function getCommentId($id){
   	$comments = $this->model->where('post_id',$id)->get();
   	return $comments;
   }
   // add a comment 
   public function addComment($request){
   	$this->model->insert([
    		'user_id'=>$request->user_id,
    		'body'=>$request->body,
    		'post_id'=>$request->post_id
    	]);
   }
   // delete comment
   public function deleteCommentId($id){
    $this->model->where('id','=',$id)->delete();

   }
}