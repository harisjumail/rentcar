<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

class LoginController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect('car');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {

        // echo $request->email;

        //   //  die('ok');

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'user_status'=>'1'
        ];
        // print_r($data);
        // die();
        // if (Auth::check() && Auth::user()->role == 'admin') {
        //     return $next($request);
        //   }

     if (Auth::Attempt($data) ) {
            return redirect('car');
        }
        else{
              print_r($data);
        }
        // if (Auth::Attempt($data) && Auth::user()->role == 'user') {
        //     return redirect('car');
        // }
        // elseif(Auth::Attempt($data) && Auth::user()->role == 'manager'){
        //     return redirect('approval');
        // }
        // elseif(Auth::Attempt($data) && Auth::user()->role == 'ga'){
        //     return redirect('approvalga');
        // }
        // else{
        //     return redirect()->route('login')->with(['error' => 'Login gagal']);
        // }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {

        

    }
    
}
