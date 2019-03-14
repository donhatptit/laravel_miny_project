<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'tbl_subject';
    public $timestamps = false;
    public function category()
    {
        return $this->belongsTo('App\Category', 'class_id', 'id');
    }

    public function post()
    {
        return $this->hasMany('App\Post', 'subject_id', 'id');
    }
}
