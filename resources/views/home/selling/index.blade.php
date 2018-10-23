@extends('layout.home')

@section('title', $title)

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	
    </div>
    <div class="mws-panel-body no-padding">

		@if (count($errors) > 0)
		    <div class="mws-form-message error">
	        	错误信息
	            <ul>
	            	@foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
	            </ul>
	        </div>
		@endif
	</div>
</div>
<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
			</div>
			<ul class="nva-list">
				<a href="/"><li>首页</li></a>
				<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
				<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
				<a href="class_room.html"><li>U袋学堂</li></a>
				<a href="enterprise_id.html"><li>企业账号</li></a>
				<a href="udai_contract.html"><li>诚信合约</li></a>
				<a href="item_remove.html"><li>实时下架</li></a>
			</ul>
		</div>
	</div>
	<div class="content inner">
		<section class="filter-section clearfix">
			<ol class="breadcrumb">
				<li><a href="/">首页</a></li>
				<li class="active">热卖专区</li>
			</ol>
			<div class="filter-box">
				<div class="all-filter">
					<div class="filter-value">
						
						<a href="" class="sale-title">热卖专区</a>
					</div>
				</div>
			</div>
			<div class="sort-box bgf5">
				<div class="sort-text">排序：</div>
				<a href=""><div class="sort-text">销量 <i class="iconfont icon-sortDown"></i></div></a>
				<a href=""><div class="sort-text">评价 <i class="iconfont icon-sortUp"></i></div></a>
				<a href=""><div class="sort-text">价格 <i class="iconfont"></i></div></a>
				<div class="sort-total pull-right">共1688个商品</div>
			</div>
		</section>
		<section class="item-show__div clearfix">
			<div class="pull-left">
				<div class="item-list__area clearfix">
				@foreach($selling as $k=>$v)
					<div class="item-card">
						<a href="/home/ecommend/{{$v->id}}" class="photo">
							<img src="/{{$v->picture}}" alt="" class="cover">
							<div class="name">{{$v->gname}}</div></a>
						<div class="middle">
							<div class="price"><small>￥</small>{{$v->price}}</div>
							
						</div>
						<div class="buttom">
							<div>销量 <b>{{$v->num}}</b></div>
							<div>人气 <b>888</b></div>
							<div>评论 <b>1688</b></div>
						</div>
					</div>
				@endforeach
				</div>
				
			</div>
			<div class="pull-right">
				
				<div class="desc-segments__content">
					<div class="lace-title">
						<span class="c6">爆款推荐</span>
					</div>
					<div class="picked-box">
					@foreach($stock as $k=>$v)
						<a href="" class="picked-item"><img src="/{{$v->picture}}" alt="" class="cover"><span class="look_price">¥{{$v->price}}</span></a>
					@endforeach
					</div>
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