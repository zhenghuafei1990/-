<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Admin\Cate;
use App\Model\Admin\Goods;
use App\Model\Home\Comment;


class GoodsController extends Controller
{
    //前台商品列表页
    public function list($id)
    {
    	$rs = DB::table('goods')->where('tid',$id)->paginate(10);
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
    	$res = DB::table('goods')->orderBy('stock','asc')->take(6)->get();
        $gpic = DB::table('goodspicture')->where('gid',$id)->get()->toArray();

        // $comment = Goods::with(['comments'=>function($query){
        //     $query->orderBy('addtime','desc');
        // }])->find($id)->paginate(2);
        $comment = DB::table('goods')->join('comment','comment.gid','goods.id')
            ->where(function($query)use($id){
            $query->where('gid',$id);
        })->orderBy('cid','desc')->paginate(20);

        $mid = session('mid');
        $message = DB::table('message')->where('mid',$mid)->first();


    	return view('/home/goods/details',[
    		'title'=>'商品详情页',
    		'rs'=>$rs,
    		'res'=>$res,
            'gpic'=>$gpic,
            'comment'=>$comment,
            'message'=>$message
    	]);
    }
    //前台楼层商品列表页
    public function floor($id)
    {
        $arr_tid = DB::table('type')->where('path','like',"%,$id,%")->pluck('tid');
        $rs = DB::table('goods')->whereIn('tid',$arr_tid)->paginate(20);
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

    //前台商品搜索
    public function search(Request $request)
    {
    	$name = $request->input('gname');
    	$rs = Goods::where('gname','like','%'.$name.'%')->paginate(20);
    	$res = DB::table('goods')->orderBy('stock','desc')->take(10)->get();
    	
    	return view('/home/goods/list',[
    		'title'=>'商品列表页',
    		'rs'=>$rs,
    		'res'=>$res 
    	]);
    }
}
