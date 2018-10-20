<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LunboRequest;
use Hash;
use App\Model\Admin\Lunbo;
use Illuminate\Contracts\Encryption\DecryptException;
use DB;

class LunboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	
        //单条件查询
        $lunname = $request->input('lunname');
        //获取数据
        $rs = Lunbo::where('lunname','like','%'.$lunname.'%')->paginate($request->input('num',5));

    	
        return view('admin.lunbo.index',[
        	'title'=>'轮播浏览页面',
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
        //显示表单
        return view('admin.lunbo.add',['title'=>'轮播添加管理页面']);
       
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

        $res = $request->except('_token');

        //文件上传
        if($request->hasFile('url')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('url')->getClientOriginalExtension(); 

            //移动
            $request->file('url')->move('uploads/lunbo',$name.'.'.$suffix);
        }

        $res['url'] = '/uploads/lunbo/'.$name.'.'.$suffix;
        

        
        try{
           
            $rs = Lunbo::create($res);


            if($rs){

                return redirect('/admin/lunbo')->with('success','添加成功');
            }
        }catch(\Exception $e){

            return back()->with('error','添加失败');

        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Lunbo::find($id);

        return view('admin.lunbo.edit',[
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

         //文件上传
        if($request->hasFile('url')){

            //自定义名字
            $name = time().rand(1111,9999);

            //获取后缀
            $suffix = $request->file('url')->getClientOriginalExtension(); 

            //移动

            $request->file('url')->move('uploads/lunbo',$name.'.'.$suffix);
            $res['url'] = '/uploads/lunbo/'.$name.'.'.$suffix;



        }
        
        
        try{
           
            $res = Lunbo::where('lid',$id)->update($res);


            if($res){

                return redirect('/admin/lunbo')->with('success','修改成功');
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
           
            $res = Lunbo::where('lid',$id)->delete();

            if($res){

                return redirect('/admin/lunbo')->with('success','删除成功');
            }
        }catch(\Exception $e){

            return back()->with('error','删除失败');

        }


    }
}
