<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user/home');
    }

    public function sejarah_desa()
    {
        return view('user/sejarah_desa');
    }

    public function berita()
    {
        return view('user/berita');
    }
}
