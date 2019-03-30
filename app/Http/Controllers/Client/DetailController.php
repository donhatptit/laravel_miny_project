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
        $breadcurmbs = $this->rendBreadcurmbs($post_id);
        $data = [
            'data_class' => $data_class,
            'subject' => $subject,
            'post' => $post,
            'data_post' => $data_post,
            'breadcurmbs' => $breadcurmbs
        ];
        return view('client.detail_post', $data);
    }
    public function rendBreadcurmbs($id)
    {
        $post = Post::where('id', $id)->first();
        $subject = Subject::where('id', $post['subject_id'])->first();
        $category = Category::where('id', $subject['class_id'])->first();
        $sub = route('subject.name', [ 'class_id' => $subject['class_id'], 'subject_id' => $post['subject_id'], 'p' => 1]);
        $cate = route('category.name', ['class_id' => $subject['class_id']]);
        $data = [];
            $data = [
                'Trang chủ' => '/minyproject/public/trang-chu',
                $category['class_name'] => $cate ,
                $subject['name_subject'] => $sub ,
                $post['name'] => ''

            ];
        return $data;
    }


}