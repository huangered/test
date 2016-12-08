<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function index()
    {
	$video = "video/os_simpsons_s25e22_720p.mp4";
	$mime = "video/mp4";
	$title = "Os Simpsons";
        return view('video/index')->with(compact('video', 'mime', 'title'));
    }

}
