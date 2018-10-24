@extends('layout.home')

@section('title',$title)

@section('content')
<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
			</div>
			<ul class="nva-list">
				<a href="/"><li>首页</li></a>
				<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
				<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
				<a href="/home/video"><li>万购视频</li></a>
				<a href="enterprise_id.html"><li>企业账号</li></a>
				<a href="udai_contract.html"><li>诚信合约</li></a>
				<a href="item_remove.html"><li>实时下架</li></a>
			</ul>
		</div>
	</div>
<!-- 首页导航栏 -->

	<div class="content inner">
		<section class="panel__div panel-message__div clearfix">
			<div class="filter-value">
				<div class="filter-title">平台公告</div>
			</div>
			
			<div class="pull-left">
				<div class="msg-list">
					<a class="epe active" href="/">
						【新闻】万购商城已经上线啦
					</a>
				@foreach($article as $k=>$v)
					<a class="ep" href="/home/article/{{$v->wid}}">
						【新闻】{{$v->wname}}
					</a>
				@endforeach	
				</div>
				
				<div class="page text-right clearfix">
					{{$article->links()}}
				</div>

				

				
<style type="text/css">

.pagination li
{
color: #666;
/*padding: 10px 15px;*/
margin: 5px;
line-height: 1em;
/*border: 1px solid #999;*/
display: inline-block;
text-decoration: none;
}

.pagination li.active
{
	color: #fff;
    border-color: #b31e22;
    background-color: #b31e22;
    padding: 10px 15px;
    margin: 5px;
    line-height: 1em;
    border: 1px solid #999;
    display: inline-block;
    text-decoration: none;
}

.pagination li.disabled
{
	color: #999;
	border-color: #ccc;
	padding: 10px 15px;
    margin: 5px;
    line-height: 1em;
    border: 1px solid #999;
    display: inline-block;
    text-decoration: none;
}
</style>

				
				
			</div>
				
			<div class="message-box pull-right">
				<div class="head-div clearfix posr">
				
					<p align="center" style="font-size: 20px">
						{{$articless->describe}}
					</p>
					<p align="right" style="font-size: 15px">
						{!!date('Y-m-d H:i:s',$articless->wtime)!!}
					</p>
					
				
					<div class="title">
					</div>
					<div class="time pull-right"></div>
				</div>
				<div class="html-code">
					
					<p style="text-indent:2em;word-break:normal;font-size: 25px" >
						{{$articless->content}}
					</p>
					
				</div>
			</div>

		</section>
	</div>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="udai_welcome.html" class="r-item-hd">
					<i class="iconfont icon-user" data-badge="0"></i>
					<div class="r-tip__box"><span class="r-tip-text">用户中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_shopcart.html" class="r-item-hd">
					<i class="iconfont icon-cart"></i>
					<div class="r-tip__box"><span class="r-tip-text">购物车</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="udai_collection.html" class="r-item-hd">
					<i class="iconfont icon-aixin"></i>
					<div class="r-tip__box"><span class="r-tip-text">我的收藏</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="" class="r-item-hd">
					<i class="iconfont icon-liaotian"></i>
					<div class="r-tip__box"><span class="r-tip-text">联系客服</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="issues.html" class="r-item-hd">
					<i class="iconfont icon-liuyan"></i>
					<div class="r-tip__box"><span class="r-tip-text">留言反馈</span></div>
				</a>
			</li>
			<li class="r-toolbar-item to-top">
				<i class="iconfont icon-top"></i>
				<div class="r-tip__box"><span class="r-tip-text">返回顶部</span></div>
			</li>
		</ul>
		<script>
			$(document).ready(function(){ $('.to-top').toTop({position:false}) });

		</script>
	</div>
	
@stop

@section('js')

	<script>
		$('.ep').hover(function(){
			$(this).attr('class','ep active');
		},function(){
			$(this).attr('class','ep');
		});

	</script>


@stop


















