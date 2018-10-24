<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Cate;
use App\Model\Admin\Poster;
use App\Model\Admin\Article;
use App\Model\Admin\Message;
use DB;

class IndexController extends Controller
{
	
    public function index()
    {

        $cates = Cate::getCatesubs();

    	$poster = Poster::get();

        $mid = session('mid');

        $message = Message::where('mid',$mid)->first();

        $ecommend =  DB::table('goods')->orderBy('stock','desc')->take(6)->get();

        $articless = Article::get();

        $selling = DB::table('goods')->get();
        
        $rs = DB::table('lunbo')->orderBy('lid','desc')->take(6)->get();
    	return view('home.index',[
    		'title'=>'万购购物商城',
    		'poster'=>$poster,
    		'rs'=>$rs,
            'cates'=>$cates,
            'ecommend'=>$ecommend,
            'selling'=>$selling,
            'articless'=>$articless,
            'message'=>$message
    	]);

    }
    
}