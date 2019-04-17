<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class TagRepository extends EloquentRepository
{
    public function model()
   {
       return \App\Tag::class;
   }	
   //get all tag
   public function getTag(){
   	 $tag = $this->model->get();
   	 return $tag;
   }
}