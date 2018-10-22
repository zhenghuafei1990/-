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


@if(count($errors) > 0)						
<div class="alert alert-danger" role="alert">
  <ul>
  	@foreach ($errors->all() as $error)
  		<li>{{$error}}</li>
	@endforeach
  </ul>
</div>
@endif

	<form action="/home/usershome/caddrcreate" class="user-addr__form form-horizontal" method="post" role="form">
		<p class="fz18 cr">新增收货地址<span class="c6">&nbsp;&nbsp;&nbsp;&nbsp;均为必填项</span></p>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">收货人姓名：</label>
			<div class="col-sm-6">
				<input class="form-control" name="cname" placeholder="请输入姓名" type="text">
			</div>
		</div>
		<div class="form-group">
			<label for="mobile" class="col-sm-2 control-label">手机号码：</label>
			<div class="col-sm-6">
				<input class="form-control" name="cphone" placeholder="请输入手机号码" type="text">
			</div>
		</div>
		<div class="form-group"">
			<label for="details" class="col-sm-2 control-label">收货地址：</label>
			<div class="col-sm-10">
				<input class="form-control" name="caddr" placeholder="请输入收货地址" type="text">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-6">
				<div class="checkbox">
					<label><input id="che" type="checkbox"><i></i> 设为默认收货地址</label>
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


	<p class="fz18 cr">已保存的有效地址</p>

	<div class="table-thead addr-thead">
		<div class="tdf1">收货人</div>
		<div class="tdf2">所在地</div>
		<div class="tdf1">电话/手机</div>
		<div class="tdf2">操作</div>
		<div class="tdf1">是否默认</div>
	</div>
	@foreach($rs as $k => $v)
	<div class="addr-list">
		<div class="addr-item" style="height: 43px">
			<div class="tdf1">{{$v->cname}}</div>
			<div class="tdf2">{{$v->caddr}}</div>
			<div class="tdf1">{{$v->cphone}}</div>
			<div class="tdf2">
				<a href="/home/usershome/edit/{{$v->id}}" type="button" class="btn btn-info">修改</a>
				<!-- <button  class="btn btn-info"></button> -->
				
				<form action="/home/usershome/delete/{{$v->id}}" method="post" style="display: inline;">

					{{csrf_field()}}
	            	{{method_field('DELETE')}}
					<button type="submit" class="btn btn-danger">删除</button>

				</form>
			</div>
			<div class="tdf1">
				@if($v->status == 1) <span class="default active">默认地址</span> @endif
			</div>
		</div>
	</div>
	@endforeach
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














