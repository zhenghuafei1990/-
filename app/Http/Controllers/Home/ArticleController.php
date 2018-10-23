<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Article;
use DB;

class ArticleController extends Controller
{
    public function index(Request $request,$id)
    {

       
        $articless = Article::where('wid',$id)->first();

		
        $article = DB::table('article')->paginate(16);

      

    	return view('home/article/article',[
    		'title'=>'万购文章列表',
            'article'=>$article,
    		'articless'=>$articless,
    	]);
        
    }
    
    

}















