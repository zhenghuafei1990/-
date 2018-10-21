<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Video;

class VideoController extends Controller
{
    public function index()
    {
    	$video = Video::get();
    	return view('home.video.index',[
    		'title'=>'万购视频学堂',
    		'video'=>$video
    	]);
    }

    public function select(Request $request)
    {

    	$re = Video::where('id',$request->id)->first();

    	// session(['reid'=>$re->id]);
    	// session(['re'=>$re->url]);

    	return response()->json($re);
    }

    public function remove(Request $request)
    {
    	

    }
}
