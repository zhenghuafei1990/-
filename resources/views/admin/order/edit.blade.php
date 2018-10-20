@extends('layout.admins')

@section('title',$title)

@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i>{{$title}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form id="mws-validate" class="mws-form" action="/admin/orders/{{$res->uid}}" method='post' novalidate="novalidate">
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                        		<div class="mws-form-row">
                                	<label class="mws-form-label">订单号</label>
                                	<div class="mws-form-item">
                                    	<input name="oid" class="required large" readonly type="text" value="{{$res->oid}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">收货人</label>
                                	<div class="mws-form-item">
                                    	<input name="oname" class="required large" type="text" value="{{$res->oname}}">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">收货地址</label>
                                	<div class="mws-form-item">
                                    	<input name="address" class="required email large" type="text" value='{{$res->address}}'>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">收货人电话</label>
                                	<div class="mws-form-item">
                                    	<input name="phone" class="required url large" type="text" value='{{$res->phone}}'>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                            	{{ csrf_field() }}
                				{{method_field('PUT')}}
                            	<input class="btn btn-primary" type="submit" value='提交'>
                            </div>
                        </form>
                    </div>    	
                </div>
@stop


@section('js')

@stop

