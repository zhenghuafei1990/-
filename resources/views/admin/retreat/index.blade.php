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
            <form action='/admin/retreat/index' method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select size="1" name="num" aria-controls="DataTables_Table_1">
                            <option value="1" @if($request->num == '1') selected="selected" @endif>
                                1
                            </option>
                            <option value="3" @if($request->num == '3') selected="selected" @endif>
                                3
                            </option>
                            <option value="5" @if($request->num == '5') selected="selected" @endif>
                                5
                            </option>
                        </select>
                        条数据
                    </label>
                </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    退货原因:
                    <input aria-controls="DataTables_Table_1"  name='town' type="text">
                </label>
                <button class='btn btn-info'>搜索</button>
            </div>
        </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width:40px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            退货号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 45px;" aria-label="Browser: activate to sort column ascending">
                            订单号
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 160px;" aria-label="Platform(s): activate to sort column ascending">
                            商品名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="Engine version: activate to sort column ascending">
                            退货原因
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 120px;" aria-label="CSS grade: activate to sort column ascending">
                            商品样式
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            退货说明
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            退货时间
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                            金额
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                            状态
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($retreat as $k=>$v)
                    <tr class="if($k % 2 == 0) :odd ?even">
                        <td class="  sorting_1">
                           {{$v->rid}}
                        </td>
                        <td class=" ">
                            {{$v->oid}}
                        </td>
                        <td class=" ">
                            {{$v->name}}
                        </td>
                        <td class=" ">
                            @if($v->town == 1)质量问题
                            @elseif($v->town == 2)发错货物
                            @elseif($v->town == 3)七天无理由退货
                            @endif
                        </td>
                        <td class=" ">
                            {{$v->type}}
                        </td>
                         <td class=" ">
                            {{$v->content}}
                        </td>
                         <td class=" ">
                           {{$v->addtime}}
                        </td>
                         <td class=" ">
                            ￥{{$v->total}}
                        </td>
                         <td class=" ">
                            @if($v->status == 0)退货订单
                            @elseif($v->status == 1)退款完成
                            @endif
                        </td>
                        <td class=" ">
                            <a class='btn btn-primary' href="/admin/retreat/send/{{$v->rid}}" style='display:inline'>退货</a>
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                Showing 1 to 10 of 57 entries
            </div>
            <style type="text/css">
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
                    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                }
                .pagination li a{
                    color:#fff;
                }
                .pagination .active{
                    background-color: #c5d52b;
                    color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                }
                .pagination .disabled{
                    color:#666666;
                    cursor:default;
                }
                .pagination{
                    margin:0px;
                }
            </style>
            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
               {{$retreat->links()}}
            </div>
        </div>
    </div>
</div>
@stop


@section('js')

@stop