@extends('layout.admins')

@section('title',$title)

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>商品类别管理页面</span>
        </div>
        <div class="mws-panel-body no-padding">
            @if (count($errors) > 0)
            <div class="mws-form-message error">
                <b>错误信息:</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            </div>
            @endif
        	<form class="mws-form" action="/admin/cate" method="post">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">分类名</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="tname">
        				</div>
        			</div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">父级分类</label>
        				<div class="mws-form-item">
        					<select class="small" name="pid">
        						<option value="0">--请选择分类--</option>  
        						@foreach($rs as $k=>$v)
        						    <option value="{{$v->tid}}">{{$v->tname}}</option> 
        						@endforeach    		   						
        					</select>
        				</div>
        			</div> 
        			<div class="mws-form-row"></div> 
        			<div class="mws-button-row">
    					{{csrf_field()}}
    					<input value="提交" class="btn btn-primary" type="submit">                    	
    				</div>      			
        	</form>
        </div>    	
    </div>
@stop