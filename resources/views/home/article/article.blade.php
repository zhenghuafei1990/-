@extends('layout.home')

@section('title',$title)

@section('content')
<!-- 搜索栏 -->
	<div class="top-search">
		<div class="inner">
			<a class="logo" href="/"><img src="/logo/logo.png" alt="万购网" class="cover"></a>
			<div class="search-box">
				<form class="input-group">
					<input placeholder="Ta们都在搜万购网" type="text">
					<span class="input-group-btn">
						<button type="button">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</button>
					</span>
				</form>

			</div>
			<div class="cart-box">
				<a href="udai_shopcart.html" class="cart-but">
					<i class="iconfont icon-shopcart cr fz16"></i> 购物车 0 件
				</a>
			</div>
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
					@foreach($article as $k=>$v)
					<a class="ep active" href="/home/article/{{$v->wid}}">
						{{$v -> wname}}
					</a>
					
					@endforeach	
				</div>


				<div class="page text-right clearfix">
					{{$article->links()}}

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
				
			</div>
				
			<div class="message-box pull-right">
				<div class="head-div clearfix posr">
					@foreach($article as $k=>$v)
					<p>
						{{$v -> wname}}

						{{$v -> wtime}}
					</p>
					@endforeach
					<div class="title">
						
					</div>
					<div class="time pull-right"></div>
				</div>
				<div class="html-code">
					@foreach($article as $k=>$v)
					<p>
						{{$v -> content}}
					</p>
					@endforeach
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


@stop