<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Message;
use App\Model\Home\Usershome;

class UsershomeController extends Controller
{
    //
    public function index()
    {
        $mid = session('mid');

    	$rs = Message::where('mid',$mid)->first();

    	return view('home.usershome.index',[
    		'title'=>'个人中心',
    		'rs'=>$rs
    	]);
    }

    public function indexupload(Request $request,$id)
    {

        $res = $request->except('_token');

        $this->validate($request, [
            'mname' => 'required',
            'phone' =>'regex:/^1[3456789]\d{9}$/',
            'email' =>'email:email',

        ],[
            'mname.required' => '用户名不能为空',
            'phone.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',
        ]);

        $rs = Message::where('mid',$id)->first();

        if($rs->mname == $res['mname']){
            return redirect('/home/usershome')->with('error','修改失败');
        }

        $head = $rs->header; 

        if($request->hasFile('header')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('header')->getClientOriginalExtension();
            //移动
            $request->file('header')->move('uploads/header',$name.'.'.$suffix);
            
            $res['header'] = '/uploads/header/'.$name.'.'.$suffix;

            if($res['header'] && (!empty($head))){
                unlink('.'.$head);
            }
            
        }

        try{
            $ras = Message::where('mid',$id)->update($res);
            if($ras){
                return redirect('/home/usershome')->with('success','修改成功');
            }else{
                return redirect('/home/usershome')->with('success','修改修改');
            }
        }catch(\Exception $e){
            return redirect('/home/usershome')->with('error','修改失败');
        }


    }

    public function caddr()
    {
        $mid = session('mid');


        $rs = Usershome::where('mid',$mid)->get();

    	return view('home.usershome.caddr',[
            'title'=>'收货人页面',
            'rs'=>$rs
        ]);
    }


    public function caddrcreate(Request $request)
    {

        $this->validate($request, [
            'cphone' =>'regex:/^1[3456789]\d{9}$/',
            'caddr' =>'required',
            'cname' =>'required',
        ],[
            'cphone.regex'=>'手机号码格式不正确',
            'caddr.required'=>'收货地址不能为空',
            'cname.required'=>'收货人姓名不能为空',
        ]);

        //获取添加的收货信息
        $data = $request->except('_token');

        $mid = session('mid');

        $res = Usershome::where('mid',$mid)->orderBy('status','desc')->first();
        
        //判断是否有默认地址
        if(!empty($data['status']) && $res->status == '0'){
            $data['status'] = '1';
        } else {
            $data['status'] = '0';
        }

        $data['mid'] = session('mid');

        try{
            $res = Usershome::create($data);

            if($res){
                return redirect('/home/usershome/caddr')->with('success','添加成功');
            }

        }catch(\Exception $e){

            return redirect('/home/usershome/caddr')->with('error','添加失败');

        }
        

    }

    public function edit($id)
    {

        $mname = session('mname');

        $rs = Message::where('mname',$mname)->first();

        $res = Usershome::where('id',$id)->first();

        return view('home.usershome.edit',[
            'title'=>'收货地址修改',
            'res'=>$res,
            'rs'=>$rs
        ]);





    }

    public function upload(Request $request,$id)
    {
        $rs = $request->except('_token');

        try{
            $res = Usershome::where('id',$id)->update($rs);
            if($res){
                return redirect('/home/usershome/caddr')->with('success','修改成功');
            } else {
                return redirect('/home/usershome/caddr')->with('success','修改成功');
            }
        }catch(\Exception $e){
            return redirect('/home/usershome/caddr')->with('error','修改失败');
        }

    }

    public function delete($id)
    {
        try{
            $res = Usershome::where('id',$id)->delete();
            if($res){
                return redirect('home/usershome/caddr')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }
    }
}



















