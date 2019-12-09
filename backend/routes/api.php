<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/posts', function () {
    return \App\Post::all();
});

Route::post('/post', function (Request $request){
    $request->validate([
       'headline' => 'required',
       'content' => 'required',
       'author_id' => 'required|integer',
       'teaser' => 'required|max:120'
    ]);
    // TODO : update post correctly - current bug is insertion..
    return [];
});

// TODO post controller
Route::get('/post/{id}', function ($id) {
    return \App\Post::find($id);
});

// TODO : static function?
Route::delete('/post/{id}', function ($id) {
    return \App\Post::destroy($id);
});
