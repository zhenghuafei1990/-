@extends('layout.home')

@section('title',$title)

@section('content')

<!-- 首页导航栏 -->
	<div class="top-nav bg3">
		<div class="nav-box inner">
			<div class="all-cat">
				<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
					<div class="cat-list__box">
	                    @foreach($cates as $k=>$v)
	                    <div class="cat-box">
	                        <div class="title">
	                            <i class="iconfont icon-skirt ce"></i>{{$v->tname}}

	                        </div>	

	                        <ul class="cat-list clearfix">
	                            @foreach($v->sub as $kk=>$vv)
	                            <li>{{$vv->tname}} </li> 
	                            @endforeach                           
	                        </ul>
	                        <div class="cat-list__deploy">
	                            <div class="deploy-box">
	                                 <div class="genre-box clearfix">
	                                 	@foreach($v->sub as $kk=>$vv)
										<span class="title">{{$vv->tname}}：</span>
										<div>
											@foreach($vv->sub as $kkk=>$vvv)
											<a href="/home/goods/list/{{$vvv->tid}}" style="color:white;text-decoration:none;margin-left:5px;font-size:16px;">{{$vvv->tname}}</a>
											@endforeach					
										</div>
										@endforeach
									</div>                            

	                            </div>           
	                        </div>
	                    </div> 
	                    @endforeach 
				</div>
			</div>
			<ul class="nva-list">
				<a href="index.html"><li class="active">首页</li></a>
				<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
				<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
				<a href="/home/video"><li>万购视频</li></a>
				<a href="enterprise_id.html"><li>企业账号</li></a>
				<a href="udai_contract.html"><li>诚信合约</li></a>
				<a href="item_remove.html"><li>实时下架</li></a>
			</ul>
			<div class="user-info__box">
				<div class="login-box">
					<div class="avt-port">
						<img src="@if($message){{$message->header}} @else /logo/logo.png @endif" alt="欢迎来到U袋网" class="cover b-r50">
					</div>
					<!-- 已登录 -->
					<div class="name c6">Hi~ <span class="cr">@if($message){{$message->mname}}@endif</span></div>
					<div class="point c6">积分: 30</div>

					<!-- 未登录 -->
					<!-- <div class="name c6">Hi~ 你好</div>
					<div class="point c6"><a href="">点此登录</a>，发现更多精彩</div> -->
					<div class="report-box">
						<span class="badge">+30</span>
						<a class="btn btn-info btn-block disabled" href="#" role="button">已签到1天</a>
						<!-- <a class="btn btn-primary btn-block" href="#" role="button">签到领积分</a> -->
					</div>
				</div>
				<div class="agent-box">
					<a href="#" class="agent">
						<i class="iconfont icon-fushi"></i>
						<p>申请网店代销</p>
					</a>
					<a href="javascript:;" class="agent">
						<i class="iconfont icon-agent"></i>
						<p><span class="cr">9527</span>位代销商</p>
					</a>
				</div>
				<div class="verify-qq">
					<div class="title">
						<i class="fake"></i>
						<span class="fz12">真假QQ客服验证-远离骗子</span>
					</div>
					<form class="input-group">
						<input class="form-control" placeholder="输入客服QQ号码" type="text">
						<span class="input-group-btn">
							<button class="btn btn-primary submit" id="verifyqq" type="button">验证</button>
						</span>
					</form>
					<script>
						$(function() {
							$('#verifyqq').click(function() {
								DJMask.open({
								　　width:"400px",
								　　height:"150px",
								　　title:"U袋网提示您：",
								　　content:"<b>该QQ不是客服-谨防受骗！</b>"
							　　});
							});
						});
					</script>
				</div>
				<div class="tags">
					<div class="tag"><i class="iconfont icon-real fz16"></i> 品牌正品</div>
					<div class="tag"><i class="iconfont icon-credit fz16"></i> 信誉认证</div>
					<div class="tag"><i class="iconfont icon-speed fz16"></i> 当天发货</div>
					<div class="tag"><i class="iconfont icon-tick fz16"></i> 人工质检</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 顶部轮播 -->
    <div class="swiper-container banner-box">
        <div class="swiper-wrapper">
            @foreach($rs as $k => $v)
            <div class="swiper-slide"><a href="item_show.html"><img   src="{{$v->url}}" class="cover"></a></div>
            @endforeach
            
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- 首页楼层导航 -->
	<nav class="floor-nav visible-lg-block">
		<span class="scroll-nav active">爆款推荐</span>
		<span class="scroll-nav">女装</span>
		<span class="scroll-nav">男装</span>
		<span class="scroll-nav">活力童装</span>
		<span class="scroll-nav">时尚包包</span>
		<span class="scroll-nav">鞋靴</span>
	</nav>

	<!-- 广告内容 -->
	@foreach($poster as $k => $v)
	<div class='bigguanggao' class="floor-nav visible-lg-block" style="z-index: 10;width: 170px;padding:0px;position: fixed;right:10px;top: 257px">
		@if($v->stock == 0)
		<a href="{{$v->url}}"><img src="{{$v->image}}" alt="" width="170px"></a>
		<span class="guanggao" style="position: absolute;right:0px;top: 0px"><b>点击关闭</b></span>
		@endif
	</div>
	@endforeach



	<!-- 楼层内容 -->
	<div class="content inner" style="margin-bottom: 40px;">
		<section class="scroll-floor floor-1 clearfix">
			<div class="pull-left">
				<div class="floor-title">
					<i class="iconfont icon-tuijian fz16"></i> 爆款推荐
					<a href="" class="more"><i class="iconfont icon-more"></i></a>
				</div>
				<div class="con-box">
					<a class="left-img hot-img" href="">

						<img src="/uploads/goods/2.jpg" alt="" class="cover">
					</a>
				
					<div class="right-box hot-box">
						@foreach($ecommend as $k=>$v)
						<a href="/home/ecommend/{{$v->id}}" class="floor-item">
							<div class="item-img hot-img">
								<img src="/{{$v->picture}}" alt="纯色圆领短袖T恤活a动衫弹" class="cover">
							</div>
					
						
							<div class="price clearfix">
								<span class="pull-left cr fz16">￥{{$v->price}}</span>
								
							</div>
							<div class="name ep" title="{{$v->gname}}">{{$v->gname}}</div>
						
						</a>
						@endforeach
					</div>
				</div>
			</div>
			<div class="pull-right">
				<div class="floor-title">
					<i class="iconfont icon-horn fz16"></i> 万购文章
					<a href="/home/article/1" class="more"><i class="iconfont icon-more"></i></a>
				</div>
				<div class="con-box">
					<div class="notice-box bgf5">
						<div class="swiper-container">
							<div class="swiper-wrapper">
								@foreach($articless as $k=>$v)
								<a class="swiper-slide ep" href="/home/article/{{$v['wid']}}">
									【新闻】{{$v['wname']}}
								</a>
								@endforeach
							</div>
						</div>
					</div>
					<div class="buts-box bgf5">
						<div class="but-div">
							<a href="">
								<i class="but-icon"></i>
								<p>物流查询</p>
							</a>
						</div>
						<div class="but-div">
							<a href="home/selling">
								<i class="but-icon"></i>
								<p>热卖专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>满减专区</p>
							</a>
						</div>
						<div class="but-div">
							<a href="item_sale_page.html">
								<i class="but-icon"></i>
								<p>折扣专区</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		@foreach($cates as $k=>$v)
		@php 
			$arr_tid=DB::table('type')->where('path','like',"%,$v->tid,%")->pluck('tid');
			$rs = DB::table('goods')->whereIn('tid',$arr_tid)->orderBy('stock','asc')->take(8)->get();
		@endphp	
		<section class="scroll-floor floor-{{mt_rand(1,6)}}">
			<div class="floor-title">
				<i class="iconfont icon-skirt fz16"></i> {{$v->tname}}
				<div class="case-list fz0 pull-right">
					@foreach($v->sub as $kk=>$vv)
					<a href="/home/goods/floor/{{$vv->tid}}">{{$vv->tname}}</a>
					@endforeach
				</div>
			</div>
			<div class="con-box">
				<a class="left-img hot-img" href="">
					<img src="{{$v->picture}}" alt="" class="cover">
				</a>
				<div class="right-box">
					@foreach($rs as $kk=>$vv)
					<a href="/home/goods/details/{{$vv->id}}" class="floor-item">
						<div class="item-img hot-img">
							<img src="/{{$vv->picture}}" alt="{{$vv->gname}}" class="cover">
						</div>
						<div class="price clearfix">
							<span class="pull-left cr fz16">￥{{$vv->price}}</span>
							<span class="pull-right c6">双十一价</span>
						</div>
						<div class="name ep" title="纯色圆领短袖T恤活a动衫弹力柔软">{{$vv->gname}}</div>
					</a>
					@endforeach
				</div>
			</div>
		</section>
		@endforeach
	</div>
	<script>
		$(document).ready(function(){ 
			// 顶部banner轮播
			var banner_swiper = new Swiper('.banner-box', {
				autoplayDisableOnInteraction : false,
				pagination: '.banner-box .swiper-pagination',
				paginationClickable: true,
				autoplay : 5000,
			});
			// 新闻列表滚动
			var notice_swiper = new Swiper('.notice-box .swiper-container', {
				paginationClickable: true,
				mousewheelControl : true,
				direction : 'vertical',
				slidesPerView : 10,
				autoplay : 2e3,
			});
			// 楼层导航自动 active
			$.scrollFloor();
			// 页面下拉固定楼层导航
			$('.floor-nav').smartFloat();
			$('.to-top').toTop({position:false});
		});
	</script>
	<!-- 右侧菜单 -->
	<div class="right-nav">
		<ul class="r-with-gotop">
			<li class="r-toolbar-item">
				<a href="/home/usershome" class="r-item-hd">
					<i class="iconfont icon-user"></i>
					<div class="r-tip__box"><span class="r-tip-text">个人中心</span></div>
				</a>
			</li>
			<li class="r-toolbar-item">
				<a href="/home/cart" class="r-item-hd">
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
	


	$(".guanggao").click(function(){

		$(".bigguanggao").hide();
	});



</script>

@stop













