<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $fillable = [
        'id','name',
    ];   
    protected $table ='kinds';
    public function posts(){
    	return $this->hasMany('App\Post','kind_id');
    }

}
