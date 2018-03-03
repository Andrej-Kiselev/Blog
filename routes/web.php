<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/blog', 'blogPageController@index');
//Route::post('/blog','blogPageController@createPost');
//Route::get('blog/renderBody', 'blogPageController@modalViewC');
use App\Blog;
Route::get('/', function () {
    return view('mainPage');
});
Route::get('main', 'loginPageController@index');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/blog/renderBod/{id}', 'blogPageController@editN');
Route::post('/blog/renderBody', 'blogPageController@renderBody');
Route::resource('/blog', 'blogPageController');
Route::get('blog/{blog}/edit', function ($id){
    if (Auth::user()->status == 'admin') {
        $input = Blog::findOrFail($id);
        return view('edit', compact('input'));
    }
    else
        echo "You dont have premission!";
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index');
