@extends('layout.usershome')


@section('title',$title)


@section('content')


<div class="user-content__box clearfix bgf">
	<div class="title">账户信息-个人资料</div>

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

	<form action="/home/usershome/indexupload/{{$rs->mid}}" method="post" enctype='multipart/form-data' class="user-setting__form" style="margin-left: 280px">

		<div class="img b-r50" data-original-title="" title="">
			<img src="@if($rs->header){{$rs->header}} @else /logo/logo.png @endif" style="width: 100px;height: 100px;border-radius: 50%" class="cover">
		</div>
		<div class="mws-form-row">
                    <label class="mws-form-label">头像上传:</label>
                    <div class="mws-form-item">
                   
                        <div class="fileinput-holder" style="position: relative;"><input type="file" class="fileinput-preview" name="header" style="width: 100%; padding-right: 84px;" readonly="readonly""></div>
                    </div>
                </div>
		<div class="user-form-group">
			<label for="user-id">用户名&nbsp;:</label>
			<input type="text" style="border: solid 1px #eee;" id="user-id" value="{{$rs->mname}}" name="mname">
		</div>
		<div class="user-form-group">
			<label>等级&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			@if($rs->vip == 0) 普通会员 @endif
			@if($rs->vip == 1) 商城会员 @endif
		</div>
		<div class="user-form-group">
			<label>性别&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<label><input type="radio" name="sex" value="0" @if($rs->sex == 1)checked="checked" @endif><i class="iconfont icon-radio"></i> 男士</label>
			<label><input type="radio" name="sex" value="1" @if($rs->sex == 0)checked="checked" @endif><i class="iconfont icon-radio"></i> 女士</label>
			<label><input type="radio" name="sex" value="2" @if($rs->sex == 2)checked="checked" @endif><i class="iconfont icon-radio"></i> 保密</label>
		</div>

		<div class="user-form-group">
			<label>手机号&nbsp;:</label>
			<input type="text" name='phone' id="user-phone" style="border: solid 1px #eee;" value="{{$rs->phone}}">
		</div>

		<div class="user-form-group">
			<label>邮箱&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
			<input type="text" name="email" id="user-email" style="border: solid 1px #eee;" value="{{$rs->email}}">
		</div>


		<div class="user-form-group">
			{{csrf_field()}}
			<button type="button" class="btn">确认修改</button>
			
		</div>
	</form>




	<script src="js/zebra.datepicker.min.js"></script>
	<link rel="stylesheet" href="css/zebra.datepicker.css">
	<script>
		$('input.datepicker').Zebra_DatePicker({
			default_position: 'below',
			show_clear_date: false,
			show_select_today: false,
		});
	</script>

</div>

@stop


@section('js')

<script>

$("#user-id,#user-email,#user-phone").blur(function(){

	$('.btn').attr('type','submit');

})

$('.alert-danger,.alert-success').delay(3000).fadeOut(2000);

</script>


@stop
















