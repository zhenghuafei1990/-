@extends('layout.admins')


@section('title',$title)


@section('content')


<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

    	<form class="mws-form" action="/admin/message/{{$res->mid}}" method='post' enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名:</label>
    				<div class="mws-form-item">
    					<input type="text" name='mname' value="{{$res->mname}}" class="small">
    				</div>
    			</div>
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">性别:</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list inline">
    						<li><input type="radio" name="sex" value="0" @if($res->sex == 0) checked='checked' @endif> <label>女</label></li>
    						<li><input type="radio" name="sex" value="1" @if($res->sex == 1) checked='checked' @endif> <label>男</label></li>
    						<li><input type="radio" name="sex" value="2" @if($res->sex == 2) checked='checked' @endif> <label>保密</label></li>
    					</ul>
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">会员:</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="vip" value="0" @if($res->vip == 0) checked='checked' @endif> <label>普通用户</label></li>
                            <li><input type="radio" name="vip" value="1" @if($res->vip == 1) checked='checked' @endif> <label>会员用户</label></li>
                            
                        </ul>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">地址:</label>
                    <div class="mws-form-item">
                        <input type="text" name="addr" value="{{$res->addr}}" class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">电话:</label>
                    <div class="mws-form-item">
                        <input type="text" name="phone" value="{{$res->phone}}" class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">头像上传:</label>
                    <div class="mws-form-item">
                        <img src="{{$res->header}}" alt="" width="100px">
                        <div class="fileinput-holder" style="position: relative;"><input type="file" class="fileinput-preview" value="{{$res->header}}" name="header" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="请选择想要上传的头像图片..."></div>
                    </div>
                </div>

                

    		</div>
    		<div class="mws-button-row">

                {{csrf_field()}}

                {{method_field('PUT')}}
    			<input type="submit" value="修改" class="btn btn-info">
    			
    		</div>
    	</form>
    </div>    	
</div>

@stop