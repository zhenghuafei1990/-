<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $rs = Message::orderBy('mid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $mname = $request->input('mname');
                //如果用户名不为空
                if(!empty($mname)) {
                    $query->where('mname','like','%'.$mname.'%');
                }
            })
            ->paginate($request->input('num','10'));


        return view('admin.message.index',[
            'title'=>'浏览用户',
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
        //根据id获取数据
        $res = Message::where('mid',$id)->first();

        return view('admin.message.edit',[
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

        // 获取数据
        $rs = Message::where('mid',$id)->first();

        $head = $rs->header; 

        //删除图片
        

        //表单验证
        $res = $request->except('_token','header','_method');

        //文件上传
        if($request->hasFile('header')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('header')->getClientOriginalExtension();
            //移动
            $request->file('header')->move('uploads',$name.'.'.$suffix);
            
            $res['header'] = '/uploads/'.$name.'.'.$suffix;

            if($res['header']){
                unlink('.'.$head);
            }
            
        }

        try{
            $rs = Message::where('mid',$id)->update($res);
            if($rs){
                return redirect('/admin/message')->with('success','修改成功');
            }else{
                return redirect('/admin/message')->with('success','未进行修改');
            }
        }catch(\Exception $e){
            return redirect('/admin/message')->with('error','修改失败');
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
        //通过id获取数据
        

        try{
            $res = Message::where('mid',$id)->delete();
            if($res){
                return redirect('/admin/message')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }


    }
}













