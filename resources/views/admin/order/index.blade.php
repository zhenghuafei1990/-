@extends('layout.admins')

@section('title',$title)

@section('content')

    @if(session('success'))
    <div class="mws-form-message info">
        {{session('success')}}                 
    </div>
    @endif

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
            <form action='/admin/orders' method='get'>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    收货人:
                    <input aria-controls="DataTables_Table_1"  name='oname' type="text">
                </label>
                <button class='btn btn-info'>搜索</button>
            </div>
        </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width:20px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            订单ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 45px;" aria-label="Browser: activate to sort column ascending">
                            用户ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 44px;" aria-label="Platform(s): activate to sort column ascending">
                            收货人
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="Engine version: activate to sort column ascending">
                            收货地址
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 50px;" aria-label="CSS grade: activate to sort column ascending">
                            收货人电话
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 30px;" aria-label="CSS grade: activate to sort column ascending">
                            数量
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 80px;" aria-label="CSS grade: activate to sort column ascending">
                            购买时间
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 33px;" aria-label="CSS grade: activate to sort column ascending">
                            金额
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            卖家留言
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 60px;" aria-label="CSS grade: activate to sort column ascending">
                            状态
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="CSS grade: activate to sort column ascending">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($rs as $k=>$v)
                    <tr class="if($k % 2 == 0) :odd ?even">
                        <td class="  sorting_1">
                            {{$v->oid}}
                        </td>
                        <td class=" ">
                            {{$v->uid}}
                        </td>
                        <td class=" ">
                            {{$v->oname}}
                        </td>
                        <td class=" ">
                            {{$v->address}}
                        </td>
                        <td class=" ">
                            {{$v->phone}}
                        </td>
                         <td class=" ">
                            {{$v->num}}
                        </td>
                         <td class=" ">
                            {{$v->addtime}}
                        </td>
                         <td class=" ">
                            ￥{{$v->total}}
                        </td>
                         <td class=" ">
                            {{$v->msg}}
                        </td>
                         <td class=" ">
                             @if($v->status == 0)
                                新订单
                            @elseif($v->status == 1)
                                已发货
                            @elseif($v->status == 2)
                                交易完成
                            @elseif($v->status == 3)
                                无效订单
                            @endif
                        </td>
                        <td class=" ">
                            <a class='btn btn-primary' href="/admin/orders/{{$v->oid}}/edit">修改</a>
                            <a class='btn btn-primary' href="/admin/orders/{{$v->oid}}">详情</a>
                            @if($v->status == 0)
                            <a class='btn btn-primary' href="/admin/orders/send/{{$v->oid}}" style='display:inline'>发货</a>
                            @endif
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
                {{$rs->links()}}
            </div>
        </div>
    </div>
</div>
@stop


@section('js')

<script type="text/javascript">
    $('.mws-form-message').delay(1000).fadeOut(2000);
</script>

@stop