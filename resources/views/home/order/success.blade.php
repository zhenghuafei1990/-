@extends('layout.carts')

@section('title',$title)
<style type="text/css">
	#shouh{
		margin:10px;
		padding:10px;
		font-size:25px;
		border:solid 1px red;
		width:700px;
	}
	#duihao{
		width:50px;
		position:absolute;
		left:60px;
		top:250px;
	}
</style>

@section('content')
<div class="take-delivery" style='margin:120px;'>

    <img src="/home/images/successdui.jpg" id='duihao'>

    <div class="status">
        <h2>
            您已成功付款
        </h2>
        <div class="successInfo">
            <ul>
                <li style='font-size:30px'>
                    付款金额 : &nbsp;
                    <em style='color:red'>

                        ¥{{session('countMoney')}}


                        ¥{{$rs->total}}


                    </em>
                </li>
                <div id='shouh'>
                    <p>	
                        收货人：&nbsp;&nbsp;&nbsp;&nbsp;{{$rs->oname}}
                    </p>
                    <p>
                        联系电话：{{$rs->phone}}
                    </p>
                    <p>
                        收货地址：{{$rs->address}}
                    </p>
                    <p>
                        下单时间:&nbsp;&nbsp;&nbsp;{{$rs->addtime}}
                    </p>
                    <p>
                        订单号:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$rs->oid}}
                    </p>
                </div id='hedui'>
                <p style='font-size:20px'>
                    请认真核对您的收货信息，如有错误请联系客服
                </p>
            </ul>
            <div style='font-size:20px'>
                <span class="info" style='font-size:20px'>
                    您可以
                </span>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;查看


                <a href="/home/orders">


                    <span style='font-size:18px;color:red'>
                        已买到的宝贝
                    </span>
                </a>
                &nbsp;或者&nbsp;
                <a href="/">
                    <span style='font-size:18px;color:red'>
                        返回首页
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')

@stop