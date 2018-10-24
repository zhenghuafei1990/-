<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Message;

use Hash;


class SetloginController extends Controller
{
    public function index()
    {
    	return view('home.setlogin.index',['title'=>'忘记密码']);
    }

    public function dosetlogin(Request $request)
    {


    	$this->validate($request, [
            'mname' => 'required',
            'phone' => 'required',
        ],[
            'mname.required' => '用户名不能为空',
            'phone.required' => '手机号不能为空',
        ]);

    	$rs = $request->except('_token','_method');

    	$mname = Message::where('mname',$rs['mname'])->first();

    	if(!$mname){
    		return redirect('/home/setlogin')->with('error','用户名或手机号不正确');
    	}

    	$phone = Message::where('phone',$rs['phone'])->first();

    	if(!$phone){
    		return redirect('/home/setlogin')->with('error','用户名或手机号不正确');
    	}

    	session(['mnames' => $rs['mname']]);

        return redirect('/home/set');

    	
    }


    public function set()
    {

    	return view('home.setlogin.set',['title'=>'新密码页面']);
    }

    public function setpass(Request $request)
    {
    	$rs = $request->except('_token','_method');

		$rs['password'] = Hash::make($rs['password']);


    	$res = Message::where('mname',$rs['mname'])->update($rs);

    	if($res){
    		return redirect('/home/login');
    	}


    }


}




















