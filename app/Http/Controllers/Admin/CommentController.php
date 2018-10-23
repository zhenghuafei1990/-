<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Comment;
use App\Model\Admin\Orders;
use DB;

class CommentController extends Controller
{
    public function index(Request $request)
    {
    	//从数据库查查询数据
    	// $comment = Comment::with('details')->get();
        // $mid = session('mid');

    	$comment =  DB::table('detail')->orderBy('cid','desc')
    	->join('comment','detail.did','comment.did')
        ->where(function($query) use($request){
            //检测关键字
            $name = $request->input('name');
            $star = '';
            if( $request->input('star') =='好评'){
            	$star = 1;
            }else if($request->input('star') =='中评'){
            	$star = 2;
            }else if($request->input('star') =='差评'){
            	$star = 3;
            }

            //如果名字不为空
            if(!empty($name)) {
                $query->where('name','like','%'.$name.'%');
            }
            //如果评价等级不为空
            if(!empty($star)) {
                $query->where('star','=',$star);
            }
        })
        ->paginate($request->input('num', 3));


    	return view('/admin/comment/index',[
    		'title'=>'评论管理',
    		'comment'=>$comment,
    		'request'=>$request
    	]);


    }
}
