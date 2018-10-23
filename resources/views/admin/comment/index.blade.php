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
            <form action='/admin/comment/index' method='get'>
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
                            <option value="10" @if($request->num == '10') selected="selected" @endif>
                                10
                            </option>
                        </select>
                        条数据
                    </label>
                </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    商品名字:
                    <input aria-controls="DataTables_Table_1"  name='name' type="text">
                </label>
                <label>
                    评价等级:
                    <input aria-controls="DataTables_Table_1"  name='star' type="text">
                </label>
                <button class='btn btn-info'>搜索</button>
            </div>
        </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width:100px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                            用户ID
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
                            内容
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 200px;" aria-label="Platform(s): activate to sort column ascending">
                            商品名称
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="Engine version: activate to sort column ascending">
                            评价等级
                        </th>
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            评论时间
                        </th>
                         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1"
                        rowspan="1" colspan="1" style="width: 100px;" aria-label="CSS grade: activate to sort column ascending">
                            图片
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach( $comment as $k=>$v )
                    <tr class="if($k % 2 == 0) :odd ?even">
                        <td class="  sorting_1" style='text-align:center'>
                            {{$v->mid}}
                        </td>
                        <td class=" ">
                            {{$v->content}}
                        </td>
                        <td class=" ">
                            {{--$v->details->name--}}
                            {{$v->name}}
                        </td>
                        <td class=" " style='text-align:center'>
                            @if($v->star == 1)好评
                            @elseif($v->star == 2)中评
                            @elseif($v->star == 3)差评
                            @endif
                        </td>
                        <td class=" ">
                            {{$v->addtime}}
                        </td>
                         <td class=" ">
                            <img src="{{$v->image}}" style='width:150px'>
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
               {{$comment->appends($request->all())->links()}}
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