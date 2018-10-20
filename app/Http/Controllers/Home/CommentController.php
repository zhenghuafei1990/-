<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Orders;
use App\Model\Admin\Details;

use App\Model\Home\Comment;

use DB;

class CommentController extends Controller
{

    /**
    **评论页面
    **/
    public function comments($did)
    {
        $detail = Details::where('did',$did)->get();
        // dd($detail);

        return view('/home/comment/comment',[
            'title'=>'评价页面',
            'detail'=>$detail
        ]);
    }

    /**
    **添加评论
    **/
    public function create(Request $request,$did)
    {   
        // dd($did);
        $rs = $request->all();
        // dd($rs);

        //前台获取的数据
        $res = $request->except('_token');
        
        $res['uid'] = session('mid');

        //获取gid
        $res['did'] = $did;

        //评论的时间
        $res['addtime'] = date('Y-m-d H:i:s');
// dd($res);
        //文件上传
        if($request->hasFile('image')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('image')->getClientOriginalExtension();
            //移动
            $request->file('image')->move('uploads/pinglun',$name.'.'.$suffix);
            
            $res['image'] = '/uploads/pinglun/'.$name.'.'.$suffix;
            
        }
        // dd($res);
        

        try{
            $rs = Comment::create($res);

            if($rs){
                return redirect('/home/orders');
            }

        }catch(\Exception $e){

            return back();

        }
    }


    /**
    **查看评论
    **/
    public function index($did)
    {
        $comment = Comment::where('did',$did)->first();
        $detail = Details::where('did',$did)->first();

        return view('/home/comment/index',[
            'title'=>'查看评价页面',
            'detail'=>$detail,
            'comment'=>$comment
        ]);
    }


    public function delete($cid)
    {
        try{
            $res = COmment::where('cid',$cid)->delete();
            if($res){
                return redirect('/home/orders');
            }
        }catch(\Exception $e){
            return back();
        }
    }

}
