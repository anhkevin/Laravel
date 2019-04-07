<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ValidateRequest\LoginValidate;
use Auth;
use App\User;

class LoginController extends Controller
{
    /**
     * Form Login
     */
    public function getLogin()
    {
        if (Auth::check()) {
            return redirect('admincp');
        } else {
            return view('front.login');
        }

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postLogin(Request $request)
    {
        // Validate
        LoginValidate::validateLogin($request);

        $login = [
            'username' => $request->txtUsername,
            'password' => $request->txtPassword,
            'level' => 1,
            'status' => 1
        ];
        if (Auth::attempt($login, $request->has('txtRemember'))) {
            return redirect('admincp');
        } else {
            return redirect()->back()->with('status', 'Username hoặc Password không chính xác');
        }
    }

    /**
     * Form Forgot Password
     */
    public function getForgotPassword()
    {
        if (Auth::check()) {
            return redirect('admincp');
        } else {
            return view('front.forgot_password');
        }

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postForgotPassword(Request $request)
    {
        // Validate
        LoginValidate::validateLogin($request);

        $login = [
            'username' => $request->txtUsername,
            'password' => $request->txtPassword,
            'level' => 1,
            'status' => 1
        ];
        if (Auth::attempt($login, $request->has('txtRemember'))) {
            return redirect('admincp');
        } else {
            return redirect()->back()->with('status', 'Username hoặc Password không chính xác');
        }
    }

    /**
     * action admincp/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
