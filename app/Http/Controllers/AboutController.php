<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        //kembali ke view index di folder about
        return view('about.index');
    }
}
