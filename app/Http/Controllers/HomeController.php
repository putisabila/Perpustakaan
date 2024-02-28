<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('komponen.konten');
    }

    public function peminjam()
    {
        return view('komponen2.konten');
    }

    public function petugas()
    {
        return view('komponen3.konten');
    }
}
