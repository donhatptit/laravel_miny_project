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
        $subject = Subject::orderBy('id', 'desc')->paginate(4);
        return view('admin.subject.list', ['subject' => $subject]);
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
                'name_subject' => 'required|unique:subject,name_subject',

            ], [
                'name_subject.required' => 'Vui lòng nhập tên môn học',
                'name_subject.unique' =>'Môn học đã tồn tại'
            ]);
        $subject= new Subject();
        $subject->name_subject = $request->name_subject;
        $subject->class_id = $request->class_id;
        $subject->save();
        $request->session()->flash('message', 'Thêm thành công!');
        return redirect(route('subject.manager'));
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
        $subject = Subject::findOrFail($id);
        $categories = Category::all();
        $data =[
            'subject' => $subject,
            'categories' => $categories
        ];
        return view('admin.subject.edit', $data);
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


        $subject = Subject::findOrFail($id);

        $subject->name_subject= $request->name_subject;
        $subject->save();
        $request->session()->flash('status','Sửa thành công!');
        return redirect(route('subject.manager'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        session()->flash('mess', 'Xóa thành công');
        return redirect(route('subject.manager'));
    }
}
