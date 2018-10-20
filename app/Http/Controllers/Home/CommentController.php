<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use DB;

class CommentController extends Controller
{
	/**
	**添加评论
	**/
    public function create($oid)
    {

    	$order = Orders::where('oid',$oid)->first();
    	$detail = Details::where('oid',$oid)->first();

    	// $count = DB::table('orders')->get();

    	// dd($count);
    	

    	// dd($detail);

    	// dd($order);

    	return view('/home/comment/comment',[
    		'title'=>'评价页面',
    		'order'=>$order,
    		'detail'=>$detail
    	]);
    }
}
