@extends('layout.usershome')

@section('title',$title)

@section('content')
<div class="user-content__box clearfix bgf">
    <div class="title">
        退款页面
    </div>
    <div class="order-list__box bgf">
        <div class="order-panel">
            <ul class="nav user-nav__title" role="tablist">
                <li role="presentation" class="nav-item active">
                    <a href="#all" aria-controls="all" role="tab" data-toggle="tab">
                        所有订单
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="all">
                    <table class="table table-hover table-striped text-center">
                        <tr>
                            <th width="170">
                                申请单号
                            </th>
                            <th width="170">
                                原订单号
                            </th>
                            <th width="170">
                                商品名称
                            </th>
                            <th width="105">
                                申请时间
                            </th>
                            <th width="105">
                                应退金额
                            </th>
                            <th width="90">
                                订单状态
                            </th>
                        </tr>
                        @foreach($retreat as $k=>$v)
                        <tr>
                            <td>
                                {{$v->rid}}
                            </td>
                            <td>
                                {{$v->oid}}
                            </td>
                            <td class="text-left">
                                <div class="name ep" style="width: 180px">
                                    {{$v->name}}
                                </div>
                            </td>
                            <td>
                                {{$v->addtime}}
                            </td>
                            <td>
                                ¥{{$v->total}}
                            </td>
                            <td class="refund-state">
                                @if($v->status == 0)退货订单
                                @elseif($v->status == 1)退款完成
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <style type="text/css">                 
                            .pagination li  {
                                float:left;
                                color: #666;
                                padding: 10px 15px;
                                margin: 5px;
                                line-height: 1em;
                                border: 1px solid #999;
                                display: inline-block;
                                text-decoration: none;
                                cursor: pointer;
                            }
                            .pagination .active {
                                    background-color: #b31e22;
                                    color: #fff;
                                    border: none;
                                    background-image: none;
                                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                            }
                        </style>
                        <div class="dataTables_paginate paging_full_numbers" id='fenye' style="margin-top: 40px;float:right">
                            {{$retreat->links()}}
                        </div>



                </div>
                <div role="tabpanel" class="tab-pane fade" id="money">
                    <table class="table text-center">
                        <tr>
                            <th width="380">
                                商品信息
                            </th>
                            <th width="85">
                                单价
                            </th>
                            <th width="85">
                                数量
                            </th>
                            <th width="120">
                                实付款
                            </th>
                            <th width="120">
                                交易状态
                            </th>
                            <th width="120">
                                交易操作
                            </th>
                        </tr>
                        <tr class="order-empty">
                            <td colspan='6'>
                                <div class="empty-msg">
                                    最近没有退款订单！
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="item">
                    <table class="table text-center">
                        <tr>
                            <th width="380">
                                商品信息
                            </th>
                            <th width="85">
                                单价
                            </th>
                            <th width="85">
                                数量
                            </th>
                            <th width="120">
                                实付款
                            </th>
                            <th width="120">
                                交易状态
                            </th>
                            <th width="120">
                                交易操作
                            </th>
                        </tr>
                        <tr class="order-empty">
                            <td colspan='6'>
                                <div class="empty-msg">
                                    最近没有退货订单！
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('js')
       

@stop