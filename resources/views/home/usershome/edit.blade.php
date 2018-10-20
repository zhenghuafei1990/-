@extends('layout.usershome')


@section('title',$title)


@section('content')

<style>
	.user-content__box{
			width: 950px;
			padding: 10px 24px;
			background-color: #fff;
			margin-left: 250px;
		}
	.user-addr__form{
			width: 700px;
    		padding: 20px 0;
		}
	.form-group{
			height: 40px;
	}
</style>



<div class="user-content__box clearfix bgf">
	<div class="title">账户信息-收货地址</div>
	<form action="/home/usershome/upload/{{$res->id}}" class="user-addr__form form-horizontal" method="post" role="form">
		<p class="fz18 cr">新增收货地址<span class="c6">&nbsp;&nbsp;&nbsp;&nbsp;均为必填项</span></p>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">收货人姓名：</label>
			<div class="col-sm-6">
				<input class="form-control" name="cname" value="{{$res->cname}}" type="text">
			</div>
		</div>
		<div class="form-group">
			<label for="mobile" class="col-sm-2 control-label">手机号码：</label>
			<div class="col-sm-6">
				<input class="form-control" value="{{$res->cphone}}" name="cphone" placeholder="请输入手机号码" type="text">
			</div>
		</div>
		<div class="form-group"">
			<label for="details" class="col-sm-2 control-label">收货地址：</label>
			<div class="col-sm-10">
				<input class="form-control" value="{{$res->caddr}}" name="caddr" placeholder="请输入收货地址" type="text">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-6">
				<div class="checkbox">
					<label><input id="che" @if($res->status == 1) checked='checked' @endif type="checkbox"><i></i> 设为默认收货地址</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-6">
				{{csrf_field()}}
				<button type="submit" class="but">添加</button>
				
			</div>
		</div>
	</form>

@if(session('success'))
<div class="alert alert-success" role="alert">
	{{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
	{{session('error')}}
</div>
@endif

	
</div>

@stop



@section('js')

<script>

$('#che').click(function(){
	if($('#che').prop('checked')) {
    	$(this).attr('name','status');
	} else {
		$(this).removeAttr('name');
	}
})

$('.alert').delay(2000).fadeOut(1000);

</script>

@stop














