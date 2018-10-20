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
                                    商品信息
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
                            <tr class="order-item">
                                <td>
                                    <label>
                                        <a href="udai_order_detail.html" class="num">
                                            {{$order->addtime}} 订单号: {{$order->oid}}
                                        </a>
                                        <div class="card">
                                            <div class="img">
                                                <img src="{{$detail[0]['img']}}" alt="" class="cover">
                                            </div>
                                            <div class="name ep2">
                                                {{$detail[0]['name']}}
                                            </div>
                                            <div class="format">
                                                {{$detail[0]['type']}}
                                            </div>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    ￥{{$order->total}}
                                </td>
                                <td>
                                   {{$order->num}}
                                </td>
                                <td>
                                    ￥{{$order->total}}
                                    <br>
                                    <span class="fz12 c6 text-nowrap">
                                        (含运费: ¥0.00)
                                    </span>
                                </td>
                                <td class="state">
                                	@if($order->status == 0)新订单
                                	@elseif($order->status == 1)已发货<br><a href="/home/order/finish/{{$order->oid}}">确认收货</a>
                                	@elseif($order->status == 2)完成订单
                                	@elseif($order->status == 3)无效订单
                                	@endif
                                </td>
                                <td class="order">
                                	<a href="/home/order/{{$order->oid}}" class="but c6">
                                        订单详情
                                    </a>
                                    <a href="/home/comment/create/{{$order->oid}}" class="but c6">评价</a>
                                    @if($order->status !=2)
                                    <a href="/home/order/invalid/{{$order->oid}}" class="but c6">
                                        取消订单
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <div class="page text-right clearfix" style="margin-top: 40px">
                            <a class="disabled">
                                上一页
                            </a>
                            <a class="select">
                                1
                            </a>
                            <a href="">
                                2
                            </a>
                            <a href="">
                                3
                            </a>
                            <a class="" href="">
                                下一页
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('js')

@stop
