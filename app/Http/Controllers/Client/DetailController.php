<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subject;
use App\Post;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post_id, $subject_id)
    {
       

        $post = Post::where('id', $post_id)->first();
        $subject = Subject::where('id', $subject_id)->first();
        $data_class = Category::with('subject')->orderBy('id', 'desc')->get();
        $data_post = Post::all()->slice(0, 6)->sortByDesc('id');

        $data = [
            'data_class' => $data_class,
            'subject' => $subject,
            'post' => $post,
            'data_post' => $data_post
        ];
        return view('client.detail_post', $data);
    }

}