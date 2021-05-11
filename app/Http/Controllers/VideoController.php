<?php

namespace App\Http\Controllers;

use App\Video;
use App\Jobs\ProcessVideo;
use Illuminate\Http\Request;

class VideoController extends Controller {

   public function store(Request $request)
   {
       // here we would the uploaded video from $request
       // and store it along with its path﻿﻿
       $video = Video::create([]);
       // Then, pass the heavy lifting to our job
       ProcessVideo::dispatch($video);

       return redirect('/videos/' . $video->id);
   }

   public function show(Video $video)
   {
       return view('videos.show', compact('video'));
   }
}
