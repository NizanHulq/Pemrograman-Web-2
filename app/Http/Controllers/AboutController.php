<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // dd('hello');
        return view("about");
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
