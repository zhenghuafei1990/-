<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    public function index()
    {
    	$friend = DB::table('friend')->get();

    	return view('layout.home',['friend'=>$friend]);
    }
}
