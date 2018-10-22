<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Message;

use Hash;
use Mail;
use DB;

class MessageController extends Controller
{
    //
    public function index()
    {
    	return view('home.message.add',['title'=>'万购注册用户页面']);
    }

    public function create(Request $request)
    {
    	//表单验证
        $this->validate($request,[
            'mname'=>'unique:message,mname|regex:/^\w{4,16}$/',
            'password'=>'regex:/^\S{4,12}$/',
            'repassword'=>'same:password',
            'phone'=>'regex:/^1[3456789]\d{9}$/',
            'email'=>'email:email',
        ],[
            'mname.unique'=>'用户名已被占用',
            'mname.regex'=>'用户名格式不正确',
            'password.regex'=>'密码格式不正确',
            'repassword.same'=>'两次密码不一致',
            'phone.regex'=>'手机号码格式不正确',
            'email.email'=>'邮箱格式不正确',
        ]);

		$res = $request->except('_token','repassword');
        
		$res['password'] = Hash::make($res['password']);

        $res['status'] = '0';

        $token = str_random(60);

        session(['token' => $token]);

        try{
            $rs = DB::table('message')->insertGetId($res);
        
            if($rs){
                //邮箱验证
                Mail::send('home.email.emessage', ['id'=>$rs,'res'=>$res,'token'=>$token], function ($m) use ($res){
                    //从哪发出的邮件
                    $m->from(env('MAIL_USERNAME'), 'wgshop注册中心');
                    //发给谁
                    $m->to($res['email'], $res['mname'])->subject('wgshop注册验证!');

                });
            
                return redirect('/home/message/youxiang');
            }
	    }catch(\Exception $e){

	        return redirect('/home/message/create')->with('error','注册失败');
	       }

    	
	}



    public function jihuo(Request $request)
    {
        //获取id
        $id = $request->input('id');

        //通过id获取数据
        $res = Message::find($id);

        $tokens = $request->input('token');

        //获取token
        $token = session('token');

        if($tokens != $token){
            return redirect('/home/message')->with('error','注册未成功');
        }

        $res['status'] = 1;
        $res = $res->toArray();

        $data = Message::where('mid',$id)->update($res);

        if($data){

            return redirect('/');

        }
    }

    public function youxiang()
    {
        return view('home.message.youxiang');
    }
}

















