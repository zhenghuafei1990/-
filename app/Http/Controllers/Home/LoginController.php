<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;
use App\Model\Admin\Message;


class LoginController extends Controller
{

	public function login()
	{
    	
		return view('home/login/login');
	}

	public function dologin(Request $request)
    {
        $res = $request->except('_token','_method');

        $this->validate($request, [
            'mname' => 'required',
            'password' => 'required',
            'smscode' => 'required|captcha',
        ],[
            'mname.required' => '用户名不能为空',
            'password.required' => '密码不能为空',
            'smscode.required' => '验证码不能为空',
            'smscode.captcha' => '验证码不正确',
        ]);

    	//判断用户名
    	$data = DB::table('message')->where('mname',$res['mname'])->first();

    	if(!$data){

    		return back()->with('error','用户名或者密码错误');
    	}

    	//判断密码
    	if(!Hash::check($res['password'], $data->password)){

    		return back()->with('error','用户名或者密码错误');

    	}

        if($data->status != '1'){
            return redirect('/home/login')->with('error','登录失败,未在邮箱激活');
        }

        session(['mname' => $data->mname]);

        session(['mid' => $data->mid]);

        // dd(session('data'));


        return redirect('/');

    }


    public function empty(Request $request)
    {
        $empty = session()->flush();

        if(!$empty){
            return redirect('/');
        }

    }

}
            	

    


