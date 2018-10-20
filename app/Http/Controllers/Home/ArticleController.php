<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use DB;

class ArticleController extends Controller
{
    public function index()
    {
    	
		$article = DB::table('article')->paginate(10);

    	return view('home/article/article',[
    		'title'=>'文章列表',
    		'article'=>$article
    	]);
        
    }
    public function title($id)
    {
    	$id = DB::table('article')->first();
    	dd($id);	
    	
    }

}
