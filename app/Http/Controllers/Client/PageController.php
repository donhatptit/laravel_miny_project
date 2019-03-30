<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subject;
use App\Post;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_class = Category::with('subject')->orderBy('id','desc')->get();
        $data_class_home = Category::with('subject')->where('id',9)->orwhere('id',8)->orderBy('id','desc')->get();
        $data_post = Post::all()->slice(0, 6)->sortByDesc('id');
        $subject = [];  $post_bottom = [];
        foreach ($data_class_home as $key => $cl) {
            $subject[$key] = $cl->subject->slice(0, 4);
            $subpost = $cl->post->slice(0, 6);
        }
        $data = [
            'data_class' => $data_class,
            'data_post' => $data_post,
            'data_class_home' => $data_class_home,
            'subject' => $subject,
            'post_bottom' => $post_bottom,
            'subpost' => $subpost

        ];
        return view('client.home',$data);

    }


}
