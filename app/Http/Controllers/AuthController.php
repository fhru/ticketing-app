<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @author Fahru Rahman
 * @version 1.2
 */

class AuthController extends Controller
{
    /**
     * mengembalikan ke view login
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auths.login');
    }

    /**
     * mengembalikan ke view login
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auths.register');
    }

    /**
     * mengambil data dari login dan memeriksanya
     * jika sesuai akan masuk ke dashboard
     * jika tidak sesuai akan langsung diredirect kehalaman login
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/dashboard');
        }else {
            return redirect('/login')->with('error','Wrong Email/Password');
        }
    }
    
    /**
     * mengambil data dari login dan memeriksanya
     * jika sesuai akan masuk ke dashboard
     * jika tidak sesuai akan langsung diredirect kehalaman login
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:25',
            'email' => 'required|email|unique:users',
            'telepon' => 'required|unique:users|max:15',
            'password' => 'required|min:8'
        ]);

        $user                   = new \App\Models\User;
        $user->name             = $request->name;      
        $user->email            = $request->email;    
        $user->telepon          = $request->telepon;    
        $user->password         = bcrypt($request->password); 
        $user->remember_token   = Str::random(60);       
        $user->role             = 'pelanggan';    
        $user->save();  

        if ($user == true) {
            return redirect('/login')->with('sukses', 'Register Berhasil, Silahkan Login');
        }else{
            return redirect('/register');
        }
        // dd($user);
        // return redirect('/login');
    }

    /**
     * logout
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
