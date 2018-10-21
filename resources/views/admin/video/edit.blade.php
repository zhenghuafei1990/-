@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">

    	<form class="mws-form" action="/admin/video/{{$video->id}}" method='post' enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">视频名称:</label>
    				<div class="mws-form-item">
    					<input type="text" name='vname' value="{{$video->vname}}" class="small">
    				</div>
    			</div>
    			<div class="mws-form-row">
                    <label class="mws-form-label">视频封面:</label>
                    <div class="mws-form-item">
                    	<img src="{{$video->image}}" alt="" width="100px">
                        <div class="fileinput-holder" style="position: relative;"><input type="file" class="fileinput-preview" name="image" style="width: 100%; padding-right: 84px;" readonly="readonly" ></div>
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">视频上传:</label>
                    <div class="mws-form-item">
                    	<video src="{{$video->url}}" controls width="300px"></video>
                        <div class="fileinput-holder" style="position: relative;"><input type="file" class="fileinput-preview" name="url" style="width: 100%; padding-right: 84px;" readonly="readonly" ></div>
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

@section('js')


@stop