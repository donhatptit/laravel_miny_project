<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    public function subject()
    {
        return $this->hasMany('App\Subject', 'class_id', 'id');
    }

    public function post()
    {
        return $this->hasManyThrough('App\Post', 'App\Subject', 'class_id', 'subject_id', 'id');
    }
//relation, route, middleware, 
   
}
