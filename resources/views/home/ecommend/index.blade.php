@extends('layout.home')

@section('title', $title)

@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
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
			<a href="index.html"><li>首页</li></a>
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
		<section class="item-show__div item-show__head clearfix">
			<div class="pull-left">
				<ol class="breadcrumb">
					<li><a href="index.html">首页</a></li>
					<li><a href="item_sale_page.html">爆款推荐</a></li>
					<li class="active">{{$ecommend->gname}}</li>
				</ol>
				<div class="item-pic__box" id="magnifier">
					<div class="small-box">
						<img class="cover" src="{{$ecommend->picture}}" alt="{{$ecommend->gname}}">
						<span class="hover"></span>
					</div>
					<div class="thumbnail-box">
						<a href="javascript:;" class="btn btn-default btn-prev"></a>
						<div class="thumb-list">
							<ul class="wrapper clearfix">
							@foreach($spicture as $k=>$v)
								<li class="item active" data-src="{{$v->gpic}}"><img class="cover" src="{{$v->gpic}}" alt="商品预览图"></li>
							@endforeach
							</ul>
						</div>
						<a href="javascript:;" class="btn btn-default btn-next"></a>
					</div>
					<div class="big-box"><img src="" alt="重回汉唐 旧忆 原创设计日常汉服女款绣花长褙子吊带改良宋裤春夏"></div>
				</div>
				<script src="/home/js/jquery.magnifier.js"></script>
				<script>
					$(function () {
						$('#magnifier').magnifier();
					});
				</script>
				<div class="item-info__box">
					<div class="item-title">
						<div class="name ep2">{{$ecommend->gname}}</div>
						<div class="sale cr">优惠活动：该商品享受8折优惠</div>
					</div>
					<div class="item-price bgf5">
						<div class="price-box clearfix">
							<div class="price-panel pull-left">
								售价：<span class="price">￥{{$ecommend->price}} </span>
							</div>
							<div class="vip-price-panel pull-right">
								会员等级价格 <i class="iconfont icon-down"></i>
								<ul class="all-price__box">
									<!-- 登陆后可见 -->
									<li><span class="text-justify">普通：</span>40.00元</li>
									<li><span class="text-justify">银牌：</span>38.00元</li>
									<li><span class="text-justify">超级：</span>28.00元</li>
									<li><span class="text-justify">V I P：</span>19.20元</li>
								</ul>
							</div>
							<script>
								// 会员价格折叠展开
								$(function () {
									$('.vip-price-panel').click(function() {
										if ($(this).hasClass('active')) {
											$('.all-price__box').stop().slideUp('normal',function() {
												$('.vip-price-panel').removeClass('active').find('.iconfont').removeClass('icon-up').addClass('icon-down');
											});
										} else {
											$(this).addClass('active').find('.iconfont').removeClass('icon-down').addClass('icon-up');
											$('.all-price__box').stop().slideDown('normal');
										}
									});
								});
							</script>
						</div>
						<div class="c6">普通会员限购 2 件，想要<u class="cr"><a href="">购买更多</a></u>？</div>
					</div>
					<ul class="item-ind-panel clearfix">
						<li class="item-ind-item">
							<span class="ind-label c9">累计销量</span>
							<span class="ind-count cr">{{$ecommend->stock}}</span>
						</li>
						<li class="item-ind-item">
							<a href=""><span class="ind-label c9">累计评论</span>
							<span class="ind-count cr"></span></a>
						</li>
						<li class="item-ind-item">
							<a href=""><span class="ind-label c9">赠送积分</span>
							<span class="ind-count cg">666</span></a>
						</li>
					</ul>
					<div class="item-key">
						<div class="item-sku">
						</div>
						<div class="item-amount clearfix bgf5">
						</div>
						<div class="item-action clearfix bgf5">
							<a href="/home/cart/create/{{$ecommend->id}}" rel="nofollow" data-addfastbuy="true" role="button" class="item-action__basket" style='float:left'>
								<i class="iconfont icon-shopcart"></i> 加入购物车
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="pull-right picked-div">
				<div class="lace-title">
					<span class="c6">爆款推荐</span>
				</div>
				<div class="swiper-container picked-swiper">

					<div class="swiper-wrapper">
						<div class="swiper-slide">
						@foreach($stock as $k=>$v)
							<a class="picked-item" href="">
								<img src="{{$v->picture}}" alt="" class="cover">
								<div class="look_price">{{$v->price}}</div>
							</a>
						@endforeach	
						</div>
						
					</div>
				</div>
				<div class="picked-button-prev"></div>
				<div class="picked-button-next"></div>
				<script>
					$(document).ready(function(){ 
						// 顶部banner轮播
						var picked_swiper = new Swiper('.picked-swiper', {
							loop : true,
							direction: 'vertical',
							prevButton:'.picked-button-prev',
							nextButton:'.picked-button-next',
						});
					});
				</script>
			</div>
		</section>
		<section class="item-show__div item-show__body posr clearfix">
			<div class="item-nav-tabs">
				<ul class="nav-tabs nav-pills clearfix" role="tablist" id="item-tabs">
					<li role="presentation" class="active"><a href="#detail" role="tab" data-toggle="tab" aria-controls="detail" aria-expanded="true">商品详情</a></li>
					<li role="presentation"><a href="#evaluate" role="tab" data-toggle="tab" aria-controls="evaluate">累计评价 <span class="badge"></span></a></li>
					
				</ul>
			</div>
			<div class="pull-left">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="detail" aria-labelledby="detail-tab">
						<div class="item-detail__info clearfix">
							<div class="record">商品编号：D-8812</div>
							<div class="record">上架时间：{{$ecommend->addtime}}</div>
							<div class="record">商品毛重：200克</div>
							<div class="record">商品库存：{{$ecommend->stock}}</div>
						</div>
						<div class="rich-text">
							<p style="text-align: center;">
								<i id="desc-module-1" style="font-size: 0"></i>

								<img src="images/temp/S-001_1.jpg" alt=""><br><img src="images/temp/S-001_2.jpg" alt=""><br>

								<i id="desc-module-2" style="font-size: 0"></i><img src="images/temp/S-001_3.jpg" alt=""><br><img src="images/temp/S-001_4.jpg" alt=""><br><img src="images/temp/S-001_5.jpg" alt=""><br><img src="images/temp/S-001_6.jpg" alt=""><br><img src="images/temp/S-001_7.jpg" alt=""><br><img src="images/temp/S-001_8.jpg" alt=""><br>
								
								<i id="desc-module-3" style="font-size: 0"></i><img src="images/temp/S-001_9.jpg" alt=""><br><img src="images/temp/S-001_10.jpg" alt=""><br><img src="images/temp/S-001_11.jpg" alt=""><br><img src="images/temp/S-001_12.jpg" alt=""><br>
								
								<i id="desc-module-4" style="font-size: 0"></i><img src="images/temp/S-001_13.jpg" alt=""><br><img src="images/temp/S-001_14.jpg" alt=""><br><img src="images/temp/S-001_15.jpg" alt=""><br><img src="images/temp/S-001_16.jpg" alt=""><br><img src="images/temp/S-001_17.jpg" alt=""><br><img src="images/temp/S-001_18.jpg" alt=""><br><img src="images/temp/S-001_19.jpg" alt=""><br><img src="images/temp/S-001_20.jpg" alt=""><br><img src="images/temp/S-001_21.jpg" alt=""><br><img src="images/temp/S-001_22.jpg" alt=""><br><img src="images/temp/S-001_23.jpg" alt=""><br><img src="images/temp/S-001_24.jpg" alt=""><br><img src="images/temp/S-001_25.jpg" alt=""><br><img src="images/temp/S-001_26.jpg" alt=""><br><img src="images/temp/S-001_27.jpg" alt=""><br><img src="images/temp/S-001_28.jpg" alt=""><br><img src="images/temp/S-001_29.jpg" alt=""><br><img src="images/temp/S-001_30.jpg" alt=""><br><img src="images/temp/S-001_31.jpg" alt=""><br><img src="images/temp/S-001_32.jpg" alt=""><br><img src="images/temp/S-001_33.jpg" alt=""><br><img src="images/temp/S-001_34.jpg" alt=""><br><img src="images/temp/S-001_35.jpg" alt=""><br><img src="images/temp/S-001_36.jpg" alt=""><br>
								
								<i id="desc-module-5" style="font-size: 0"></i><img src="images/temp/S-001_37.jpg" alt=""><br><img src="images/temp/S-001_38.jpg" alt=""><br><img src="images/temp/S-001_39.jpg" alt=""><br><img src="images/temp/S-001_40.jpg" alt=""><br><img src="images/temp/S-001_41.png" width="790" alt="">
							</p>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="evaluate" aria-labelledby="evaluate-tab">
						<div class="evaluate-tabs bgf5">
							<ul class="nav-tabs nav-pills clearfix" role="tablist">
								<li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab" aria-controls="all" aria-expanded="true">全部评价 <span class="badge"></span></a></li>
								<li role="presentation"><a href="#good" role="tab" data-toggle="tab" aria-controls="good">好评 <span class="badge"></span></a></li>
								<li role="presentation"><a href="#normal" role="tab" data-toggle="tab" aria-controls="normal">中评 <span class="badge"></span></a></li>
								<li role="presentation"><a href="#bad" role="tab" data-toggle="tab" aria-controls="bad">差评 <span class="badge"></span></a></li>
							</ul>
						</div>
						<div class="evaluate-content">
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="all" aria-labelledby="all-tab">
									@foreach($comment as $k=>$v)
									<div class="eval-box">
										<div class="eval-author">
											<div class="port">
												<img src="{{$message->header}}" alt="欢迎来到U袋网" class="cover b-r50">
											</div>
											<div class="name">{{$message->mname}}</div>
										</div>
										<div class="eval-content">
											<div class="eval-text">
												{{$v->content}}
											</div>
											<div class="eval-imgs">
												<div class="img-temp"><img src="{{$v->image}}" data-src="images/temp/S-001-1_b.jpg" data-action="zoom" class="cover"></div>
											</div>
											<div class="eval-time">
												@if($v->star == 1)好评
												@elseif($v->star == 2)中评
												@elseif($v->star == 3)差评
												@endif
											</div>
											<div class="eval-time">
												{{$v->addtime}}
											</div>
										</div>
									</div>
									@endforeach
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
			                                    background-color: #b31e22;
			                                    color: #fff;
			                                    border: none;
			                                    background-image: none;
			                                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
			                            }
			                        </style>
			                        <div class="dataTables_paginate paging_full_numbers" id='fenye' style="margin-top: 40px;float:right">
			                            {{$comment->links()}}
			                        </div>
									<!-- 分页 -->
									<div class="page text-center clearfix"></div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="good" aria-labelledby="good-tab">
									@foreach($comment as $k=>$v)
									@if($v->star == 1)
									<div class="eval-box">
										<div class="eval-author">
											<div class="port">
												<img src="{{$message->header}}" alt="欢迎来到U袋网" class="cover b-r50">
											</div>
											<div class="name">{{$message->mname}}</div>
										</div>
										<div class="eval-content">
											<div class="eval-text">
												{{$v->content}}
											</div>
											<div class="eval-imgs">
												<div class="img-temp"><img src="{{$v->image}}" data-src="images/temp/S-001-1_b.jpg" data-action="zoom" class="cover"></div>
											</div>
											<div class="eval-time">
												{{$v->addtime}} 
											</div>
										</div>
									</div>
									@endif
									@endforeach

									<!-- 分页 -->
									<div class="page text-center clearfix"></div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="normal" aria-labelledby="normal-tab">
									@foreach($comment as $k=>$v)
									@if($v->star == 2)
									<div class="eval-box">
										<div class="eval-author">
											<div class="port">
												<img src="{{$message->header}}" alt="欢迎来到U袋网" class="cover b-r50">
											</div>
											<div class="name">{{$message->mname}}</div>
										</div>
										<div class="eval-content">
											<div class="eval-text">
												{{$v->content}}
											</div>
											<div class="eval-imgs">
												<div class="img-temp"><img src="{{$v->image}}" data-src="images/temp/S-001-1_b.jpg" data-action="zoom" class="cover"></div>

											</div>
											<div class="eval-time">
												{{$v->addtime}}
											</div>
										</div>
									</div>
									@endif
									@endforeach

									<!-- 分页 -->
									<div class="page text-center clearfix"></div>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="bad" aria-labelledby="bad-tab">
									@foreach($comment as $k=>$v)
									@if($v->star == 3)
									<div class="eval-box">
										<div class="eval-author">
											<div class="port">
												<img src="{{$message->header}}" alt="欢迎来到U袋网" class="cover b-r50">
											</div>
											<div class="name">{{$message->mname}}</div>
										</div>
										<div class="eval-content">
											<div class="eval-text">
												{{$v->content}}
											</div>
											<div class="eval-imgs">
												<div class="img-temp"><img src="{{$v->image}}" data-src="images/temp/S-001-1_b.jpg" data-action="zoom" class="cover"></div>

											</div>
											<div class="eval-time">
												{{$v->addtime}}
											</div>
										</div>
									</div>
									@endif
									@endforeach
									<!-- 分页 -->
									<div class="page text-center clearfix">
									</div>
								</div>
							</div>
							<script src="/home/js/jquery.zoom.js"></script>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="service" aria-labelledby="service-tab">
						<!-- 富文本 -->
						
					</div>
			    </div>
				<div class="recommends">
					<div class="lace-title type-2">
						<span class="cr">爆款推荐</span>
					</div>
					<div class="swiper-container recommends-swiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
							@foreach($stock as $k=>$v)
								<a class="picked-item" href="">
									<img src="{{$v->picture}}" alt="" class="cover">
									<div class="look_price">¥{{$v->price}}</div>
								</a>
							@endforeach	
							</div>
						</div>
					</div>
					<script>
						$(document).ready(function(){
							var recommends = new Swiper('.recommends-swiper', {
								spaceBetween : 40,
								autoplay : 5000,
							});
						});
					</script>
				</div>
			</div>
			<div class="pull-right">
				<div class="tab-content" id="descCate">
					<div role="tabpanel" class="tab-pane fade in active" id="detail-tab" aria-labelledby="detail-tab">
						<div class="descCate-content bgf5">
							<dd class="dc-idsItem selected">
								<a href="#desc-module-1"><i class="iconfont icon-dot"></i> 产品图</a>
							</dd>
							<dd class="dc-idsItem">
								<a href="#desc-module-2"><i class="iconfont icon-selected"></i> 细节图</a>
							</dd>
							<dd class="dc-idsItem">
								<a href="#desc-module-3"><i class="iconfont"></i> 尺寸及试穿</a>
							</dd>
							<dd class="dc-idsItem">
								<a href="#desc-module-4"><i class="iconfont"></i> 模特效果图</a>
							</dd>
							<dd class="dc-idsItem">
								<a href="#desc-module-5"><i class="iconfont"></i> 常见问题</a>
							</dd>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="evaluate-tab" aria-labelledby="evaluate-tab">
						<div class="descCate-content posr bgf5">
							<div class="lace-title">
								<span class="c6">相关推荐</span>
							</div>
							<div class="picked-box">
								<a class="picked-item" href="">
									<img src="images/temp/S-001-1_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-2_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-3_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-4_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-5_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="service-tab" aria-labelledby="service-tab">
						<div class="descCate-content posr bgf5">
							<div class="lace-title">
								<span class="c6">最近浏览</span>
							</div>
							<div class="picked-box">
								<a class="picked-item" href="">
									<img src="images/temp/S-001-1_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-2_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-3_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-4_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
								<a class="picked-item" href="">
									<img src="images/temp/S-001-5_s.jpg" class="cover">
									<div class="look_price">¥134.99</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				$(document).ready(function(){
					$('#descCate').smartFloat(0);
					$('.dc-idsItem').click(function() {
						$(this).addClass('selected').siblings().removeClass('selected');
					});
					$('#item-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e) {
						$('#descCate #' + $(e.target).attr('aria-controls') + '-tab')
						.addClass('in').addClass('active').siblings()
						.removeClass('in').removeClass('active');
					});
				});
			</script>
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