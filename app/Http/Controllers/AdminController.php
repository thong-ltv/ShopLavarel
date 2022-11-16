<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        dd(bcrypt('thong'));//ma hoa pass
        //dd(md5(123));
        if(auth()->check())
        {
            return redirect()->to('home');
        }
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        //kiem tra ten dang nhap va password
        $remember = $request->has('remember-me') ? true : false;

        if(auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
            
        ], $remember))
        {
            return redirect()->to('home');
        }else{
            return redirect()->to('/');
        }
    }
}
