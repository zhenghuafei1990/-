@extends('layout.usershome')

@section('title',$title)

@section('content')
<div class="user-content__box clearfix bgf">
    <div class="title">
        订单中心-商品评价
    </div>
    <div class="evaluate_box">
        <div class="evaluate_info posr clearfix">
            <div class="img">
                <img src="{{$detail->img}}" style='width:300px;height:200px' alt="" class="cover">
            </div>
            <div class="name ep2">
                {{$detail->name}}
            </div>
            <div class="param">
                <div class="param-row">
                    <span class="param-label">
                        价格
                    </span>
                    <b class="cr fz24">
                        {{$detail->dollar}}
                    </b>
                    <span class="cr">
                        元
                    </span>
                </div>
                <div class="param-row">
                    <div class="param-row">
                        <span class="param-label">
                            数量
                        </span>
                        <span class="c6 fz20">
                            {{$detail->count}}
                        </span>
                    </div>
                    <div class="param-row">
                        <span class="param-label">
                            类型
                        </span>
                        <span class="c6 fz20">
                            {{$detail->type}}
                        </span>
                    </div>
                    <div class="param-row">
                        <span class="param-label">
                            评论时间
                        </span>
                        <span class="c6 fz20">
                            {{$comment->addtime}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    <p class="fz18 cr">
        您的评价
    </p>
    <div class="modify_div">
            <table class="table table-bordered" style='width:500px'>
                <span class="help-block">
                感谢您的评论
                </span>
                <tr>
                    <th scope="row" style='width:100px'>
                        评价等级
                    </th>
                    <td>
                        @if($comment->star == 1)好评
                        @elseif($comment->star == 2)中评
                        @elseif($comment->star == 3)差评
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        您的评价
                    </th>
                    <td>
                        {{$comment->content}}
                    </td>
                </tr>
                <tr valign="middle">
                    <th scope="row">图片</th>
                    <td>
                        <div>
                            <img src="{{$comment->image}}" style='width:150px'>
                        </div>
                    </td>
                </tr>
            </table>
            <div style='left:300px'>
            <form action='/home/comment/delete/{{$comment->cid}}' method='post'>
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <button class="but pull-right" >删除评论</button>
            </form>
        </div> 
    </div>
</div>
@stop

@section('js')

@stop
