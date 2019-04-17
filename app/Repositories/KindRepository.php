<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;

class KindRepository extends EloquentRepository
{
    public function model()
   {
       return \App\Kind::class;
   }	
   
}