@extends('layout.admins')


@section('title',$title)


@section('content')




<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">




    	<form action="/admin/poster" method='post' enctype='multipart/form-data' class="mws-form">
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">广告商家</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='postername'>
    				</div>
    			</div>

    			<div class="mws-form-row">
                    <label class="mws-form-label">广告图片上传:</label>
                    <div class="mws-form-item">
                   
                        <div class="fileinput-holder" style="position: relative;"><input type="file" class="fileinput-preview" name="image" style="width: 100%; padding-right: 84px;" readonly="readonly" placeholder="请选择想要上传的广告图片..."></div>
                    </div>
                </div>


    			<div class="mws-form-row">
    				<label class="mws-form-label">图片链接地址</label>
    				<div class="mws-form-item">
    					<input type="text" class="large" name='url'>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">广告内容</label>
    				<div class="mws-form-item">
    					<input type="text" class="required large" name='content'>
    				</div>
    			</div>

    			<div class="mws-form-row">
                    <label class="mws-form-label">状态:</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="stock" value="0" checked='checked'> <label>前台开启</label></li>
                            <li><input type="radio" name="stock" value="1" > <label>前台关闭</label></li>
                            
                        </ul>
                    </div>
                </div>

    		<div class="mws-button-row">
    			{{csrf_field()}}
    			<input type="submit" class="btn btn-primary" value="添加广告">
    			
    		</div>
    	</form>
    </div>    	
</div>
@stop


@section('js')

<script>
	/*setTimeout(function(){

		$('.mws-form-message').fadeOut(2000);

	},5000)*/

	$('.mws-form-message').delay(3000).fadeOut(2000);
</script>



@stop