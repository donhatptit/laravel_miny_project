<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Subject;
use App\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class_id)
    {
        $data_class = Category::with('subject')->orderBy('id', 'desc')->get();

        $title = Subject :: where('class_id', $class_id)->take(3)->get();
        $news = [];
        foreach ($title as $key => $tl) {
            $news[$key] = $tl->post->take(3);

        }
        $data = [
            'data_class' => $data_class,
            'title' => $title,
            'class_id' => $class_id,
            'news' =>$news
        ];
         return view('client.category', $data);
    }
    public function getDetail($class_id, $subject_id, $p)
    {
        $data_class = Category::with('subject')->orderBy('id', 'desc')->get();
        $title = Subject::where('id', $subject_id)->first();
        $record_per_page = 3;
        $total_record = Post::all()->where('subject_id', $subject_id)->count();
        $num_page = ceil($total_record/$record_per_page);
        $from = ($p-1) * $record_per_page;

        $post = Post::all()->where('subject_id', $subject_id)->sortByDesc('id')->slice($from, $record_per_page);
        $data = [
            'data_class' => $data_class,
            'class_id' => $class_id,
            'subject_id' => $subject_id,
            'p' => $p,
            'title' => $title,
            'post' => $post

        ];
        return view('client.category_detail', $data);
    }

   public function getLastest()
   {
       $data_class = Category::with('subject')->orderBy('id', 'desc')->get();
       $data_post = Post::all()->slice(0, 6)->sortByDesc('id');
       $data = [
           'data_class' => $data_class,
           'data_post' => $data_post


       ];
       return view('client.lastest_detail', $data);
   }
}
