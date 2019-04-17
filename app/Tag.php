<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'nametag'
    ];   
    protected $table ='tags';
   
}
