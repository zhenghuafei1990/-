<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Cate;
use App\Model\Admin\Poster;
use DB;

class IndexController extends Controller
{
	
    public function index()
    {

        $cates = Cate::getCatesubs();

    	$poster = Poster::get();

        $ecommend = DB::table('goods')->get();

        $selling = DB::table('goods')->get();
       
        
        $rs = DB::table('lunbo')->orderBy('lid','desc')->take(6)->get();
    	// $rs = DB::table('lunbo')->get();

    	return view('home.index',[
    		'title'=>'万购购物商城',
    		'poster'=>$poster,
    		'rs'=>$rs,
            'cates'=>$cates,
            'ecommend'=>$ecommend,
            'selling'=>$selling
            

    	]);

    }
    
}