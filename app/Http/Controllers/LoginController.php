<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check())
        {
            return redirect('login');
        }
        else
        {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required',
        ]);
        
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
    
        if (Auth::attempt($data)) {
            $user = Auth::user();
    
            if ($user->role === 'admin') {
                return redirect('homeadmin');
            } elseif ($user->role === 'petugas') {
                return redirect('homepetugas');
            } elseif ($user->role === 'peminjam') {
                return redirect('homepeminjam');
            }
    
            return redirect('home'); 
        } 
        else {
            Session::flash('error', 'Wrong Email or Password');
            return redirect('/');
        }              
    }

    public function register()
    {
        if (Auth::check())
        {
            return redirect('register');
        }
        else
        {
            return view('register');
        }
    }

    public function registeraksi(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'email' => 'required|string|email|max:255|unique:users',
            'alamat' => 'required|string',
            'role' => 'required|in:admin,peminjam',
        ]);
    
        $user = new User([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);
    
        $user->save();
    
        return redirect()->route('login')->with('success', 'Registration success. Please login!');
    }
    

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}
