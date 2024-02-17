<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('layout.main');
    }

    public function peminjam()
    {
        return view('homepeminjam');
    }
}
