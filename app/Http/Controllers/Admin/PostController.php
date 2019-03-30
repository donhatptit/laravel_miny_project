<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Subject;
use App\Post;
use Illuminate\Support\Facades\Session;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id', 'desc')->paginate(6);
        return view('admin.post.list', ['post' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('admin.post.add', ['subjects' => $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Vui lòng nhập tiêu đề',
                'content.required' => 'Vui lòng nhập nội dung'
            ]);

        $post = new Post();
        $post->name = $request->name;
        $post->subject_id = $request->subject_id;
        $post->content = $request->get('content');
        $post->athour = Auth::user()->fullname;
        $post->view = 0;
        $post->favorite = 0;
        $post->save();
        $request->session()->flash('message', 'Thêm thành công!');
        return redirect(route('post.manager'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $subjects = Subject::all();
        $data =[
            'post' => $post,
            'subjects' => $subjects
        ];
        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'content' => 'required'
            ], [
                'name.required' => 'Vui lòng nhập tiêu đề',
                'content.required' => 'Vui lòng nhập nội dung'
            ]);

        $post = Post::findOrFail($id);

        $post->name = $request->name;
        $post->subject_id = $request->subject_id;
        $post->content = $request->get('content');
        $post->view = 0;
        $post->favorite = 0;
        $post->save();
        $request->session()->flash('status','Sửa thành công!');
        return redirect(route('post.manager'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('mess', 'Xóa thành công!');
        return redirect(route('post.manager'));
    }
}
