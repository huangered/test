<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/video','VideoController@index');
Route::get('/video/{filename}', function ($filename) {
    \Log::info("hello");
    // Pasta dos videos.
    $videosDir = base_path('resources/assets/videos');
    if (file_exists($filePath = $videosDir."/".$filename)) {
        $stream = new \App\VideoStream($filePath);
        return response()->stream(function() use ($stream) {
            $stream->start();
        });
    }
    return response("File doesn't exists", 404);
});