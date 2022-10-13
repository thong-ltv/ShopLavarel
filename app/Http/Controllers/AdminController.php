<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        // dd(bcrypt(123));//ma hoa pass
        if(auth()->check())
        {
            return redirect()->to('home');
        }
        return view('login');
    }

    public function postLoginAdmin(Request $request)
    {
        //kiem tra ten dang nhap va password
        $remember = $request->has('remember_me') ? true : false;
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
