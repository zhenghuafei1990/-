@extends('layout.usershome')


@section('title',$title)

@section('content')
<div class="user-content__box clearfix bgf">
    <div class="title">
        订单中心-商品评价
    </div>
    @foreach($detail as $k=>$v)
    <div class="evaluate_box">
        <div class="evaluate_info posr clearfix">
            <div class="img">
                <img src="{{$v->img}}" gid='{{$v->gid}}' style='width:300px;height:200px' alt="" class="cover">
            </div>
            <div class="name ep2">
                {{$v->name}}
            </div>
            <div class="param">
                <div class="param-row">
                    <span class="param-label">
                        价格
                    </span>
                    <b class="cr fz24">
                        {{$v->dollar}}
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
                            {{$v->count}}
                        </span>
                    </div>
                    <div class="param-row">
                        <span class="param-label">
                            类型
                        </span>
                        <span class="c6 fz20">
                            {{$v->type}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    
    <p class="fz18 cr">
        商品评价
    </p>
    <div class="modify_div">
        <form action="/home/comment/create/{{$v->did}}" method='post' class="evaluate-form__box" enctype='multipart/form-data'>
            @endforeach
            <span class="help-block">
                快评论一番，让其他买家开开眼
            </span>
            <table class="table table-bordered">
                <tr>
                    <th scope="row">
                        评价等级
                    </th>
                    <td class="user-form-group fz0">
                        <label>
                            <input name="star" value="1" checked="" type="radio">
                            <i class="iconfont icon-radio"></i>
                            <span>好评</span>
                        </label>
                        <label>
                            <input name="star" value="2" type="radio">
                            <i class="iconfont icon-radio"></i>
                            <span>中评</span>
                        </label>
                        <label>
                            <input name="star" value="3" type="radio">
                            <i class="iconfont icon-radio"></i>
                            <span>差评</span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        评价商品
                    </th>
                    <td>
                        <input type="text" name="content" style='width:450px;border:solid 0px #000' maxlength='30px' placeholder="请输入您对该商品的评价~">
                    </td>
                </tr>
                <tr valign="middle">
                    <th scope="row">晒图片</th>
                    <td>
                        <div>
                            <input type="file" name='image'>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="checkbox">
                {{csrf_field()}}
                <button type="submit" class="but pull-right">
                    提交评价
                </button>
            </div>  
        </form>
    </div>
</div>
@stop

@section('js')
<script type="text/javascript">
    $('.but').click(function(){
        alert('评论成功,谢谢评论!!!');
    })
</script>

@stop
