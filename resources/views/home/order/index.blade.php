@extends('layout.usershome')

@section('title',$title)

@section('content')
    <div class="user-content__box clearfix bgf">
        <div class="title">
            订单中心-我的订单
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
                        <table class="table text-center">
                            <tr>
                                <th width="380">

                                    订单信息

                                </th>
                                <th width="85">
                                    总价
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

                            @foreach($order as $k=>$v)
                            <tr class="order-item">
                                <td style='text-align:center'>
                                    <label>
                                        <a href="udai_order_detail.html" class="num" style='text-align:center'>
                                            {{$v->addtime}} 
                                        </a>
                                        <div class="name ep2">
                                            订单号: {{$v->oid}}
                                            <div class="name ep2">
                                                收货人:{{$v->oname}}
                                            </div>
                                            <div class="name ep2">
                                                收货地址:{{$v->address}}
                                            </div>
                                            <div class="format">
                                                收货电话:{{$v->phone}}

                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>

                                    ￥{{$v->total}}
                                </td>
                                <td>
                                   {{$v->num}}
                                </td>
                                <td>
                                    ￥{{$v->total}}

                                    <br>
                                    <span class="fz12 c6 text-nowrap">
                                        (含运费: ¥0.00)
                                    </span>
                                </td>
                                <td class="state">
                                	@if($v->status == 0)新订单
                                	@elseif($v->status == 1)已发货<br><a href="/home/order/finish/{{$v->oid}}">确认收货</a>
                                	@elseif($v->status == 2)完成订单
                                	@elseif($v->status == 3)无效订单
                                	@endif
                                </td>
                                <td class="order">
                                	<a href="/home/order/{{$v->oid}}" class="but c6">
                                        订单详情
                                    </a>
                                    @if($v->status !=2)
                                    <a href="/home/order/invalid/{{$v->oid}}" class="but c6">

                                        取消订单
                                    </a>
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
                            {{$order->links()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')

@stop
