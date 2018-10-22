<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class GoodsController extends Controller
{
    //前台商品列表页
    public function list($id)
    {
    	$rs = DB::table('goods')->where('tid',$id)->paginate(20);
    	$res = DB::table('goods')->orderBy('stock','asc')->take(10)->get();
    	
    	return view('/home/goods/list',[
    		'title'=>'商品列表页',
    		'rs'=>$rs,
    		'res'=>$res
    	]);
    }

    //前台商品详情页
    public function details($id)
    {
    	$rs = (DB::table('goods')->where('id',$id)->get())[0];
    	$res = DB::table('goods')->orderBy('stock','asc')->take(10)->get();
        $gpic = DB::table('goodspicture')->where('gid',$id)->get()->toArray();
        //dd($rs);
    	return view('/home/goods/details',[
    		'title'=>'商品详情页',
    		'rs'=>$rs,
    		'res'=>$res,
            'gpic'=>$gpic
    	]);
    }
}
