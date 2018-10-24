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
        //多条件查询
             $rs = Orders::orderBy('id','desc')
        ->where(function($query) use($request){
            //检测关键字
            $oname = $request->input('oname');
            $address = $request->input('address');

            //如果收货人不为空
            if(!empty($oname)) {
                $query->where('oname','like','%'.$oname.'%');
            }
            //如果权限不为空
            if(!empty($address)) {
                $query->where('address','like','%'.$address.'%');
            }
        })
        ->paginate($request->input('num', 5));

        return view('/admin/order/index',[
            'title'=>'订单的管理页面',
            'rs'=>$rs,
            'request'=>$request
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
    public function edit($id)
    {
        $res =\DB::table('orders')->where('id',$id)->first();

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
    public function update(Request $request, $id)
    {
        $res = $request->except('_token','_method');


        try{
           $rs = Orders::where('id',$id)->update($res);
            if($rs){
                return redirect('/admin/orders')->with('success','修改成功');
            }else {
                return redirect('/admin/orders')->with('success','未进行修改');
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
    public function destroy()
    {

    }
}
