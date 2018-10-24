<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use App\Model\Admin\Retreat;
use DB;

class RetreatController extends Controller
{	

    public function index(Request $request)
    {	
    	//单条件查询
        $town = '';
        if( $request->input('town') =='质量问题'){
            $town = 1;
        }else if($request->input('town') =='发送货物'){
            $town = 2;
        }else if($request->input('town') =='七天无理由退货'){
            $town = 3;
        }

        //获取数据
        $retreat = Retreat::where('town','like','%'.$town.'%')->orderBy('id','desc')
        ->paginate($request->input('num',5));

    	return view('/admin/retreat/index',[
    		'title'=>'退货管理页面',
    		'retreat'=>$retreat,
            'request'=>$request
    	]);
    }

    //退货
    public function send($rid)
    {
        $did = session('did');
    	Retreat::where('rid',$rid)->update([ 'status' => 1 ]);
        Details::where('did',$did)->update([ 'status' => 1 ]);
        return back();
    }



}
