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
            
            <form action="/admin/usershome" method="get">
            
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select size="1" name="num" aria-controls="DataTables_Table_1">

                        <option value="3" @if($request->num == '3') selected="selected" @endif>
                            3
                        </option>
                        <option value="5" @if($request->num == '5') selected="selected" @endif>
                            5
                        </option>
                        <option value="8" @if($request->num == '8') selected="selected" @endif>
                            8

                        </option>
                    </select>
                    条数据
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    收货人姓名:
                    <input type="text" name="cname" value="{{$request->cname}}" aria-controls="DataTables_Table_1">
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
                            收货人ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 30px;">
                            用户ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 80px;">
                            收货人姓名
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 150px;">
                            收货人地址
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 100px;">
                            收货人电话
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"
                        style="width: 50px;">
                            是否为默认
                        </th>

                       
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">

  				@foreach($rs as $k=>$v)
                    <tr class="">
                        <td class="">
                    		{{$v->id}}
                        </td>
                        <td class="">
                    		{{$v->mid}}
                        </td>
                        <td class="">
                    		{{$v->cname}}
                        </td>
                        <td class="">
                    		{{$v->caddr}}
                        </td>
                        <td class="">
                    		{{$v->cphone}}
                        </td>
                        <td class="">
                    		@if($v->status == 1) 默认地址 @endif
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



@stop