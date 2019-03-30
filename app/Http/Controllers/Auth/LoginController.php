<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Auth;

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
    public function showLoginForm()
    {
        return view('admin.login');
    }
    public function getLogin(Request $request)
    {

           $rules = [
                'username' => 'required',
                'password' => 'required|min:2'
            ];
        $messages = [
                'username.required' => 'Yêu cầu nhập tài khoản!',
                'password.required' => 'Yêu cầu nhập mật khẩu!',
                'password.min' => 'Mật khẩu ít nhất 8 kí tự!'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }else
        {
            $data=[
                'username'=>$request->username,
                'password'=>$request->password
            ];
            if (Auth::attempt($data)) {
                return redirect()->intended(url('/home'));

            }else{
                $errors = new MessageBag(['errorlogin' => 'Tài khoản hoặc mật khẩu không đúng!']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
  
}
