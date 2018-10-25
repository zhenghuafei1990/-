<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Model\Admin\Ecommend;
use DB;

class EcommendController extends Controller
{

    public function ecommend()
    {
        return view('home.ecommend.ecommend');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$gname = $request->input('gname');
    	$fenye = DB::table('goods')->orderBy('stock','desc')->take(6)->get();

        

        // $picArray = Ecommend::with('ecommend')->get();
        // dd($picArray);
    	return view('admin.ecommend.index',[
    		'title'=>'商品推荐浏览管理页面',
    		'request'=>$request,
            // 'picArray' => $picArray,
            'fenye' => $fenye
    	]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
    }

 	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Ecommend::find($id);
        return view('admin.ecommend.edit',[
            'title'=>'推荐商品的修改页面',
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


         //文件上传
        if($request->hasFile('picture')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('picture')->getClientOriginalExtension(); 

            //移动
            $request->file('picture')->move('uploads/goods',$name.'.'.$suffix);

            $res['picture'] = '/uploads/goods/'.$name.'.'.$suffix;

        }
        
        try{
           
            $res = Ecommend::where('id',$id)->update($res);


            if($res){

                return redirect('/admin/ecommend')->with('success','修改成功');
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
    public function destroy($id)
    {
        try{
           
            $res = Ecommend::where('id',$id)->delete();


            if($res){

                return redirect('/admin/ecommend')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }
    }
}
