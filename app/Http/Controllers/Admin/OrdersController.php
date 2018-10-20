<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Orders;
use App\Model\Admin\Details;

use DB;

class OrdersController extends Controller
{

    //后台发货
    public function send($oid)
    {
        Orders::where('oid',$oid)->update([ 'status' => 1 ]);

        return back();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //  获取数据
        // $rs = \DB::table('orders')->paginate(5);

        //单条件查询
        $uname = $request->input('oname');
        //获取数据
        $rs = Orders::where('oname','like','%'.$uname.'%')->orderBy('id','desc')
        ->paginate($request->input('num',5));


        return view('/admin/order/index',[
            'title'=>'订单的管理页面',
            'rs'=>$rs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($oid)
    {

        $rs = Details::where('oid','=',$oid)->get();

        
        return view('/admin/order/show',[
            'title'=>'订单的详情页面',
            'rs'=>$rs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($oid)
    {
        //根据uid获取数据
        $res =\DB::table('orders')->where('oid',$oid)->first();

        return view('/admin/order/edit',[
            'title'=>'用户的修改页面',
            'res'=>$res
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uid)
    {
        $res = $request->except('_token','_method');

        try{
           $rs = Orders::where('uid',$uid)->update($res);
            if($rs){
                return redirect('/admin/orders')->with('success','修改成功');
            }
        }catch(\Exception $e){
            return back()->with('error','修改失败');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uid)
    {

        try{
           $res = Orders::where('uid',$uid)->delete();
            if($res){
                return redirect('/admin/orders')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }

    }
}
