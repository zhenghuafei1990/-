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
        // dump($cates);die;
    	$poster = Poster::get();

    	$rs = DB::table('lunbo')->get();
    	return view('home.index',[
    		'title'=>'万购购物商城',
    		'poster'=>$poster,
    		'rs'=>$rs,
            'cates'=>$cates
    	]);

    }
    
}