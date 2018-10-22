<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class EcommendController extends Controller
{
    public function ecommend($id)
    {
        $ecommend = DB::table('goods')->where('id',$id)->first();
        $spicture = DB::table('goodspicture')->where('gid',$id)->get();
    	$stock = DB::table('goods')->orderBy('stock','asc')->take(6)->get();
        // dd($ecommend);
  	
        return view('home.ecommend.index',[
        	'title'=>'爆款推荐',
        	'ecommend'=>$ecommend,
            'spicture'=>$spicture ,
            'stock'=>$stock
        	
        ]);
    }



}
