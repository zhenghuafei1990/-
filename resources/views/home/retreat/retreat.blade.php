@extends('layout.usershome')

@section('title',$title)

@section('content')
<div class="user-content__box clearfix bgf">
    <div class="title">
        申请退款
    </div>
    <div class="order-info__box">
        @foreach($detail as $k=>$v)
        <div class="return-item__info">
            <div class="img">
                <img src="{{$v->img}}" alt="" class="cover">
            </div>
            <div class="name ep2">
                {{$v->name}}
            </div>
            <div class="num">
                订单编号：{{$v->oid}}
            </div>
        </div>
        @endforeach
        <form action="/home/retreat/create/{{$v->did}}" method='post' class="user-addr__form form-horizontal" role="form">
            <div class="form-group" style='position:absolute;top:350px;left:470px;width:500px'>
                <label class="col-sm-2 control-label">
                    退款金额：
                </label>
                <div class="col-sm-6">
                    <div class="return_val cr">
                        ￥{{$v->dollar}}
                    </div>
                </div>
            </div>
            <div class="form-group" style='position:absolute;top:400px;left:470px;width:500px'>
                <label for="cause" class="col-sm-2 control-label">
                    退款原因：
                </label>
                 <div class="col-sm-10">
                    <select name="town" id="cause">
                        <option value="0">
                            请选择
                        </option>
                        <option value="1">
                            质量问题
                        </option>
                        <option value="2">
                            发错货物
                        </option>
                        <option value="3">
                            七天无理由退换
                        </option>
                    </select>
                </div> 
            </div>
            <div class="form-group" style='position:absolute;top:460px;left:470px;width:500px'>
                <label for="note" class="col-sm-2 control-label">
                    退款说明：
                </label>
                <div class="col-sm-6">
                    <input type="text" name="content" style='width:450px;' maxlength='25' placeholder="请输入您对该商品的评价~">
                </div>
            </div>
            <div class="form-group" style='position:absolute;top:570px;left:380px;width:500px'>
                <div class="col-sm-offset-2 col-sm-3">
                    {{csrf_field()}}
                    <button type="submit" class="but">
                        提交
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop


@section('js')
       

@stop