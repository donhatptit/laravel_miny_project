<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Foundation\Http\FormRequest;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    public function LoginForm()
    {
        return view('admin.login');
    }
    public function getLogin(Request $request)
    {
        $username= $request->username;
        $password = $request->password;
        $password = md5($password);
        $check = User::where('username', $username)->first();
        if (isset($check->username)) {

            if ($password == $check->password) {

                $request->session()->put('username', $check->username);
                $request->session()->put('fullname', $check->fullname);
                $request->session()->put('level', $check->level);
                $data = $request->session()->all();
                return view('admin/layout/admin');
            }else{
                return redirect()->back()->with('success', 'Xin vui lòng kiểm tra lại tài khoản và mật khẩu !');;
            }
        }

    }

    public function getLogout()
    {
        Auth::logout();
    }
  
}
