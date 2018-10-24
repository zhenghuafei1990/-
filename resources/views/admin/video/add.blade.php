@extends('layout.admins')


@section('title',$title)


@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>
        <i class="icon-table">
        </i>
        {{$title}}
    </span>
    </div>
    <div class="mws-panel-body no-padding">

    	<form class="mws-form" action="/admin/video" method='post' enctype='multipart/form-data'>
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">视频名称:</label>
    				<div class="mws-form-item">
    					<input type="text" name='vname' value="" class="small">
    				</div>
    			</div>
    			<div class="mws-form-row">
                    <label class="mws-form-label">视频封面:</label>
                    <div class="mws-form-item">
                        <div class="fileinput-holder" style="position: relative;"><input type="file" class="fileinput-preview" value="" name="image" style="width: 100%; padding-right: 84px;" readonly="readonly" ></div>
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">视频上传:</label>
                    <div class="mws-form-item">
                        <div class="fileinput-holder" style="position: relative;"><input type="file" class="fileinput-preview" value="" name="url" style="width: 100%; padding-right: 84px;" readonly="readonly" ></div>
                    </div>
                </div>

                

    		</div>
    		<div class="mws-button-row">

                {{csrf_field()}}

    			<input type="submit" value="添加" class="btn btn-info">
    			
    		</div>
    	</form>
    </div>    	
</div>


@stop

@section('js')




@stop

