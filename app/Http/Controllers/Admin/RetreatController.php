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

    	// $retreat = DB::table('retreat')->paginate(1);
    	// dd($retreat);

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
        ->paginate($request->input('num',1));
        // dd($retreat);



    	return view('/admin/retreat/index',[
    		'title'=>'退货管理页面',
    		'retreat'=>$retreat
    	]);
    }


    public function send($rid)
    {
    	Retreat::where('rid',$rid)->update([ 'status' => 1 ]);

        return back();
    }



}
