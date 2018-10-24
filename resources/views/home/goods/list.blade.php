@extends('layout.home')

@section('title',$title)

@section('content')
	<div class="content inner">
		<section class="filter-section clearfix">
			<ol class="breadcrumb">
				<li><a href="index.html">首页</a></li>
				<li class="active">满减专区</li>
			</ol>
			<div class="filter-box">
				<div class="all-filter">
					<div class="filter-value">
						<a href="" class="sale-title active">满减专区</a>
						<a href="" class="sale-title">热卖专区</a>
						<a href="" class="sale-title">折扣专区</a>
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
					@foreach($rs as $k=>$v)
					<div class="item-card">
						<a href="/home/goods/details/{{$v->id}}" class="photo">
							<img src="/{{$v->picture}}" alt="{{$v->gname}}" class="cover">
							<div class="name">{{$v->gname}}</div></a>
						<div class="middle">
							<div class="price"><small>￥</small>{{$v->price}}</div>
							<div class="sale"><a href="">加入购物车</a></div>
						</div>
						<div class="buttom">
							<div>库存 <b>{{$v->stock}}</b></div>
							<div>人气 <b>888</b></div>
							<div>评论 <b>1688</b></div>
						</div>
					</div>
					@endforeach
				</div>
				<style type="text/css">					
            	   .pagination li  {
            			float:left;
					    color: #666;
					    padding: 10px 15px;
					    margin: 5px;
					    line-height: 1em;
					    border: 1px solid #999;
					    display: inline-block;
					    text-decoration: none;
					    cursor: pointer;
					}
            		.pagination .active {
            			    background-color:#b31e22;
            			    color: #323232;
    						border: none;
    						background-image: none;
    						box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
            		}
				</style>
				<!-- 分页 -->
						{{$rs->links()}}
			</div>
			<div class="pull-right">
				
				<div class="desc-segments__content">
					<div class="lace-title">
						<span class="c6">爆款推荐</span>
					</div>
					<div class="picked-box">
						@foreach($res as $k=>$v)
						<a href="/home/goods/details/{{$v->id}}" class="picked-item"><img src="/{{$v->picture}}" alt="" class="cover"><span class="look_price">¥{{$v->price}}</span></a>
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
				<a href="/home/usershome" class="r-item-hd">
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
	</div>	
	@stop

	@section('js')	
		<script>
			$(document).ready(function(){ $('.to-top').toTop({position:false}) });
		</script>
	</div>
	@stop