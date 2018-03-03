<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Request;
use Illuminate\Support\Facades\DB;
class blogPageController extends Controller
{
    public function index (Request $request) {
        $messages = Blog::orderBy('created_at', 'desc')->paginate(4);
        return view('blogPage', compact('messages', 'info'));

    }
    public function renderBody () {
        $messages = Blog::orderBy('created_at', 'desc')->paginate(4);
        return view('oneMessage', compact('messages'));
    }

    public function store () {
        $input = Request::all();
        if (Auth::check()){
            $input['postedBy'] = Auth::user()->name;
        }
        else
            $input['postedBy'] = 'Guest';
        $input['atTime'] = Carbon::now();

        Blog::create($input);
    }

    public function edit ($id) {
        $input = Blog::findOrFail($id);
        return view('edit', compact('input'));
    }

    public function editN ($id) {
        $input = Blog::findOrFail($id);
        return $input;
    }

    public function destroy ($id) {
        $input = Blog::findOrFail($id);
        $input->delete();
    }

    public function update ($id) {
        $input = Blog::findOrFail($id);
        $input->update(Request::all());
    }
}
