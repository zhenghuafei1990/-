@extends('layout.admins')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>               
    <div class="mws-panel-body no-padding">
        <!-- @if(session('success'))
            <div class="mws-form-message success">
                {{session('success')}}
            </div>
        @endif -->

        @if (count($errors) > 0)
            <div class="mws-form-message error">
                <b>错误信息:</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><b>{{ $error }}</b></li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="mws-form" action="/admin/article/{{$res->wid}}" method="post" enctype="multipart/form-data">
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">文章标题</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="wname" value="{{$res->wname}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">文章描述</label>
                    <div class="mws-form-item">
                        <input class="medium" type="text" name="describe" value="{{$res->describe}}" >
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">文章内容</label>
                    <div class="mws-form-item">
                    <textarea rows="" cols="" class="medium" name="content">{{$res->content}}</textarea>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">文章创建时间</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="wtime">
                    </div>
                </div>

            
            </div>
            <div class="mws-button-row">
                {{csrf_field()}}  
                {{method_field('PUT')}}              
                <input value="提交" class="btn btn-primary" type="submit">                        
            </div>
        </form>
    </div>      
</div>       
@stop
@section('js')
    <script type="text/javascript">
        $('input').focus(function(){
            $('.mws-form-message').slideUp();
        }); 
            
        
        /*setTimeout(function(){
            $('.mws-form-message').fadeOut();
        },3000);*/
    </script>
@stop