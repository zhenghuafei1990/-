<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use App\Model\Admin\Retreat;
use DB;

class RetreatController extends Controller
{
    public function retreat($did)
    {

    	$detail = Details::where('did',$did)->get();
    	// dd($detail);

    	return view('/home/retreat/retreat',[
    		'title'=>'申请退货页面',
    		'detail'=>$detail
    	]);
    }


    public function create(Request $request,$did)
    {	
    	$retreat = $request->except('_token');
    	$retreat['addtime'] = date('Y-m-d H:i:s');
    	$retreat['rid'] = date('YmdHis').mt_rand(1000,9999);
    	$retreat['oid'] = DB::table('detail')->where('did',$did)->value('oid');
    	$retreat['name'] = DB::table('detail')->where('did',$did)->value('name');
    	$retreat['total'] = DB::table('detail')->where('did',$did)->value('dollar');
    	$mid = session('mid');
        $retreat['mid'] = $mid;
        // dd($retreat);
        //把did存入session
        session(['did'=>$did]);
        session(['oid'=>$retreat['oid']]);


        try{
            $rs = retreat::create($retreat);
            if($rs){
                return redirect('/home/retreat/index');
            }
        }catch(\Exception $e){
            return back();
    	}
    }

    public function index()
    {
    	$mid = session('mid');

		$retreat = Retreat::where('mid',$mid)->OrderBy('id','desc')->paginate(4);
        // dd($retreat);
		
    	return view('/home/retreat/index',[
    		'title'=>'查看退货页面',
    		'retreat'=>$retreat
    	]);

    }

}
