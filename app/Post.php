<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
        'user_id','tieude', 'tagname', 'body','kind_id','like'
    ];   
    protected $table ='posts';

    public function kind(){
    	return $this->belongsTo('App\Kind','kind_id');
    }
     public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
     public function comments(){
    	return $this->hasMany('App\Comment','post_id');
    }
    
}
