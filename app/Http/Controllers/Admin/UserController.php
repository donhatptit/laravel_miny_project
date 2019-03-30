<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listUser()
    {

            $users = User::orderBy('id', 'desc')->paginate(2);
            return view('admin.user.listuser', ['users' => $users]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.user.add_user');
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
                'fullname' => 'required',
                'username' => 'required|unique:users,username|min:3',
                'password' => 'required|min:4|max:12',
                'passwordAgain' => 'required|same:password'
            ], [
                'fullname.required' => 'Vui lòng nhập tên người dùng',
                'username.required' => 'Vui lòng nhập tài khoản',
                        'username.min' => 'Tài khoản phải có ít nhất 3 ký tự',
                        'username.unique' => 'Tài khoản đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                        'password.min' => 'Mật khẩu phải có ít nhất 4 ký tự',
                        'password.max' => 'Mật khẩu không quá 12 ký tự',
                        'passwordAgain.required' => 'Vui lòng nhập lại mật khẩu',
                        'passwordAgain.same' => 'Mật khẩu không khớp'
                    ]);
        if (isset($request->level)) {
            $request->level = 1;
        } else {
            $request->level = 0;
        }
        $user = new User;
        $user->username = $request->username;
        $user->password  = bcrypt($request->password);
        $user->fullname = $request->fullname;
        $user->level = $request->level;
        $user->save();
        $request->session()->flash('message', 'Thêm thành công!');
        return redirect(route('user.manager'));
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
        $user = User::findOrFail($id);
        return view('admin.user.edit_user', ['user' => $user]);
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
                'fullname' => 'required'

            ], [
                'fullname.required' => 'Vui lòng nhập tên người dùng'

            ]);

        if (isset($request->level)) {
            $request->level = 1;
        } else {
            $request->level = 0;
        }

        $user = User::findOrFail($id);

        $user->fullname = $request->fullname;
        if ($request->password != '') {
            $user->password  = bcrypt($request->password);
        } else {
            $user->password  = $user->password;
        }
        $user->level = $request->level;
        $user->save();
        $request->session()->flash('status', 'Sửa thành công!');

        return redirect(route('user.manager'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('mess', 'Xóa thành công');
        return redirect(route('user.manager'));
    }

}
