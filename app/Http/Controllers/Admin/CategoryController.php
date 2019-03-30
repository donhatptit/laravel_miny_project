<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Category::orderBy('id', 'desc')->paginate(4);
        return view('admin.category.list', ['cate' => $cate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
                'class_name' => 'required',

            ], [
                'class.required' => 'Vui lòng nhập tên lớp',

            ]);

        $cate= new Category();
        $cate->class_name = $request->class_name;
        $cate->save();
        $request->session()->flash('message', 'Thêm thành công!');
        return redirect(route('category.manager'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::findOrFail($id);
        return view('admin.category.edit', ['cate' => $cate]);
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
                'class_name' => 'required'
            ], [
                'class.required' => 'Vui lòng nhập tên lớp'
            ]);


        $cate = Category::findOrFail($id);

        $cate->class_name= $request->class_name;
        $cate->save();
        $request->session()->flash('status','Sửa thành công!');
        return redirect(route('category.manager'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();
        session()->flash('mess', 'Xóa thành công');
        return redirect(route('category.manager'));
    }
}
