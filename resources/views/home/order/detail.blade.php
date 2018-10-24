@extends('layout.usershome')

@section('title',$title)

@section('content')

<div class="user-content__box clearfix bgf">
    <div class="title">
        订单中心-订单详情页
    </div>
    <div class="order-info__box">
        @foreach($order as $k=>$v)
        <div class="order-addr">
            收货地址：
            <span class="c6">
               {{$v->oname}}，{{$v->phone}}，{{$v->address}}
            </span>
        </div>
        <div class="order-info">
            订单信息
            <table>
                <tr>
                    <td>
                        订单编号：{{$v->oid}}
                    </td>
                    <td>
                        创建时间：{{$v->addtime}}
                    </td>
                </tr>
            </table>
            @endforeach
        </div>
        <div class="table-thead">
            <div class="tdf3">
                商品
            </div>
            <div class="tdf1">
                数量
            </div>
            <div class="tdf1">
                小计
            </div>
            <div class="tdf1">
                评价
            </div>
            <div class="tdf1">
                退货
            </div>
        </div>
        @foreach($detail as $k=>$v)
        <div class="order-item__list">
            <div class="item">
                <div class="tdf3">
                    <a href="item_show.html">
                        <div class="img">
                            <img src="{{$v->img}}" alt="" class="cover">
                        </div>
                        <div class="ep2 c6">
                            {{$v->name}}
                        </div>
                    </a>
                </div>
                <div class="tdf1">
                    {{$v->count}}
                </div>
                <div class="tdf1">
                    ¥{{$v->dollar}}
                </div>
                <div class="tdf1">
                    <div class="ep2">
                        <a href="/home/comment/comments/{{$v->did}}" class="but c6">评价</a>
                    </div>
                </div>
                <div class="tdf1">
                    @if($v->status == 0)
                    <a href="/home/retreat/retreat/{{$v->did}}" class="but c6">申请退货</a>
                    @else 退货完成
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @foreach($order as $k=>$v)
        <div class="price-total">
            <div class="fz12 c9">
                快递运费 ￥0.0
            </div>
            <div class="fz18 c6">
                实付款：
                <b class="cr">
                    ¥{{$v->total}}
                </b>
            </div>
        </div>
        @endforeach



    </div>
</div>
@stop


@section('js')

@stop