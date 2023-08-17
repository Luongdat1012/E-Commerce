<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){

        return view('admin.HomeView');
    }
//
//    public function login()
//    {
//        if (Auth::check()){
//
//            return redirect()->route('admin.dashboard');
//        }
//        return view('admin.account.LoginView');
//    }
//
//    public function loginPost(Request $request)
//    {
//        $this->validate($request, [
//            'email' => 'required',
//            'password' => 'required'
//        ],
//            [
//                'email.required' => "Email không được để trống",
//                'password.required' => "Password không được để trống",
//            ]);
//
//        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->input('remember'))){
//            return redirect()->route('admin.dashboard');
//        }
//
//        return redirect()->route('admin.login')->with('error', 'Email hoặc mật khẩu không chính xác');
//    }

//    public function logout(Request $request){
//        Auth::logout();
//        return redirect()->route('admin.login');
//    }
}
