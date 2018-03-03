<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutPageController extends Controller
{
    public function index () {
        return view('aboutPage');
    }
}
