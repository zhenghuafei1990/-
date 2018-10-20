@extends('layout.admins')


@section('title',$title)


@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

    	<form class="mws-form" action="/admin/poster/{{$res->posterid}}" method='post' enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">广告商家:</label>
    				<div class="mws-form-item">
    					<input type="text" name='postername' value="{{$res->postername}}" class="small">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">广告图片上传:</label>
                    <div class="mws-form-item">
                   
                        <div class="fileinput-holder" style="position: relative;">
                            <img src="{{$res->image}}" alt="" width="150px">
                            <input type="file" class="fileinput-preview" name="image" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="请选择想要上传的广告图片..."></div>
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">图片链接地址:</label>
    				<div class="mws-form-item">
    					<input type="text" name='url' value="{{$res->url}}" class="large">
    				</div>
    			</div>
    			

                <div class="mws-form-row">
                    <label class="mws-form-label">广告内容:</label>
                    <div class="mws-form-item">
                        <input type="text" name="content" value="{{$res->content}}" class="required large">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">状态:</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="stock" value="0" @if($res->stock == 0) checked='checked' @endif> <label>前台开启</label></li>
                            <li><input type="radio" name="stock" value="1" @if($res->stock == 1) checked='checked' @endif> <label>前台关闭</label></li>
                            
                        </ul>
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