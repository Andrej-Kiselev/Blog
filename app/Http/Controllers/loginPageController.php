<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginPageController extends Controller
{
    public function index()
    {
        return view('mainPage');
    }
}
