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
    <form action='/admin/orders' method='get'>
        <div class="mws-panel-body no-padding">
            <table class="mws-table">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            订单号
                        </th>
                        <th>
                            商品ID号
                        </th>
                        <th>
                            商品名称
                        </th>
                        <th>
                            单价
                        </th>
                        <th>
                            数量
                        </th>
                        <th>
                            图片
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rs as $k=>$v) 
                    <tr>
                        <td>
                            {{$v->did}}
                        </td>
                        <td>
                            {{$v->oid}}
                        </td>
                        <td>
                            {{$v->gid}}
                        </td>
                        <td>
                            {{$v->name}}
                        </td>
                        <td>
                            {{$v->dollar}}
                        </td>
                        <td>
                            {{$v->count}}
                        </td>
                        <td>
                            <img src="{{$v->img}}" style='width:100px'>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>
@stop


@section('js')

@stop

