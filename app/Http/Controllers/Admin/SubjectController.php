<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub = Subject::orderBy('id', 'desc')->paginate(4);
        return view('admin.subject.list', ['sub' => $sub]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subject.add', ['categories' => $categories]);
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
                'name_subject' => 'required|unique:tbl_subject,name_subject',

            ], [
                'name_subject.required' => 'Vui lòng nhập tên môn học',
                'name_subject.unique' =>'Môn học đã tồn tại'
            ]);
        $sub= new Subject();
        $sub->name_subject = $request->name_subject;
        $sub->class_id = $request->class_id;
        $sub->save();
        return redirect('admin/subject/quan-ly-mon-hoc')->with('message', 'Thêm thành công!');
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
        $sub = Subject::find($id);
        $categories = Category::all();
        return view('admin.subject.edit', ['sub' => $sub], ['categories' => $categories]);
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
                'name_subject' => 'required',

            ], [
                'name_subject.required' => 'Vui lòng nhập tên môn học'
            ]);


        $sub = Subject::find($id);

        $sub->name_subject= $request->name_subject;
        $sub->save();

        return redirect('admin/subject/quan-ly-mon-hoc')->with('thongbao','Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = Subject::find($id);
        $sub->delete();
        return redirect('admin/subject/quan-ly-mon-hoc')->with('mess', 'Xóa thành công');
    }
}
