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
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            
            <form action="/admin/poster" method="get">
            
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select size="1" name="num" aria-controls="DataTables_Table_1">

                        <option value="5" @if($request->num == '3') selected="selected" @endif >
                            3
                        </option>
                        <option value="10" @if($request->num == '5') selected="selected" @endif>
                            5
                        </option>
                        <option value="15" @if($request->num == '8') selected="selected" @endif>
                            8
                        </option>
                    </select>
                    条数据
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    广告商家:
                    <input type="text" name="postername" value="{{$request->postername}}" aria-controls="DataTables_Table_1">
                </label>
                <button class="btn btn-info">搜索</button>
            </div>

            </form>

            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                    	
                        <th class="sorting_asc"  tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 30px;">
                            广告表ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 70px;">
                            广告商家
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 80px;">
                            广告图片
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 30px;">
                            图片链接地址
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 100px;">
                            广告内容
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 100px;">
                            广告添加时间
                        </th>

                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 40px;">
                            状态
                        </th>
                                      
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 80px;">
                            操作
                        </th>
                       
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

  				@foreach($rs as $k => $v)

                    <tr class="@if($k % 2 == 0)odd @else even @endif">

                        <td class="">
                    		{{$v->posterid}}
                        </td>
                        <td class="">
                    		{{$v->postername}}
                        </td>
                        <td class="">
                    		<img src="{{$v->image}}" alt="" width="100px">
                        </td>
                        <td class="">
                    		{{$v->url}}
                        </td>
                        <td class="">
                    		{{$v->content}}
                        </td>
                        <td class="">
                         	{!!date('Y-m-d H:i:s',$v->addtime)!!}
                        </td>

                        <td class="">
                         	@if($v->stock == 0) 前台开启 @else 前台关闭 @endif
                        </td>
                        	
                    
                        <td class="">
                            <a class="btn btn-info" href="/admin/poster/{{$v->posterid}}/edit">修改</a>

                            <form action="/admin/poster/{{$v->posterid}}" method="post" style="display: inline">
                            	{{csrf_field()}}
                            	{{method_field('DELETE')}}
                            	<button class="btn btn-danger">删除</button>
                            </form>


                        </td>
                    </tr>
                @endforeach 
                </tbody>
            </table>

            <div class="dataTables_info" id="DataTables_Table_1_info">
                正版所有 盗版必究
            </div>

            <style>
            	.pagination li{
					float: left;
				    height: 20px;
				    padding: 0 10px;
				    display: block;
				    font-size: 12px;
				    line-height: 20px;
				    text-align: center;
				    cursor: pointer;
				    outline: none;
				    background-color: #444444;
				    color: #fff;
				    text-decoration: none;
				    border-right: 1px solid #232323;
				    border-left: 1px solid #666666;
				    border-right: 1px solid rgba(0, 0, 0, 0.5);
				    border-left: 1px solid rgba(255, 255, 255, 0.15);
				    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
				}
				
				.pagination .active{
					background-color: #c5d52b;
					color: #323232;
				    border: none;
				    background-image: none;
				    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
				}

				.pagination li a{
					color: #fff;
				}

				.pagination .disabled{
					color: #666666;
					cursor: default;
				}

				.pagination{
					margin: 0px;
				}
            </style>


            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
				

				{{$rs->appends($request->all())->links()}}
                
            </div>
        </div>
    </div>
</div>

@stop



@section('js')
<script>
	
	$('.mws-form-message').delay(2000).fadeOut(1000);
</script>


@stop