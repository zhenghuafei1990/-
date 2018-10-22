<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Cate;
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
    //前台楼层商品列表页
    public function floor($id)
    {
        $arr_tid = DB::table('type')->where('path','like',"%,$id,%")->pluck('tid');
        $rs=DB::table('goods')->whereIn('tid',$arr_tid)->paginate(20);
        $res = DB::table('goods')->orderBy('stock','asc')->take(10)->get();
        //dd($rs);
        return view('/home/goods/list_floor',[
            'title'=>'商品列表页',
            'rs'=>$rs,
            'res'=>$res
        ]);
    }

    //前台楼层商品详情页
    public function floor_details($id)
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
