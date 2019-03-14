<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'tbl_post';
    public $timestamps = false;
    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id', 'id');
    }
}
