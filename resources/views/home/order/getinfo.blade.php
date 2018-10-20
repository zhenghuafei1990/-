@extends('layout.carts')

@section('title',$title)

@section('content')
	<div class="content clearfix bgf5">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车-确认支付 </div>
				<div class="shop-title">收货地址</div>
				<form action="/home/order/success" class="shopcart-form__box" method='post'>
					@foreach($cargood as $k=>$v)
					@if($v->status == 1)
						<div class="addr-radio">
							<div class="radio-line active">
								<label class="radio-label">
									
									{{$v->caddr}} （{{$v->cname}} 收） {{$v->cphone}}
									<input type="hidden" name="oname" value="{{$v->cname}}">
									<input type="hidden" name="phone" value="{{$v->cphone}}">
									<input type="hidden" name="address" value="{{$v->caddr}}">
								</label>
								<p class="default" style='height:10px'>默认地址</p>
							</div>
						</div>
					@endif
					@endforeach
					<div class="shop-title">确认订单</div>
					<div class="shop-order__detail">
						<table class="table">
							<thead>
								<tr>
									<th width="120"></th>
									<th width="300">商品信息</th>
									<th width="200">数量</th>
									<th width="200">运费</th>
									<th width="80">总价</th>
								</tr>
							</thead>
							<tbody>
								@foreach(session('goodinfo') as $k=>$v)
								<tr>
									<th scope="row"><a href="item_show.html"><div class="img"><img src="{{$v['img']}}" alt="" class="cover"></div></a></th>
									<td>
										<div class="name ep3">{{$v['name']}}</div>
										<div class="type c9">颜色分类：{{$v['type']}}</div>
									</td>
									<td>{{$v['count']}}</td>
									<td>¥0.0</td>
									<td>¥{{$v['dollar']}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="shop-cart__info clearfix">
						<div class="pull-right text-right">
							<div class="info-line">优惠活动：<span class="c6">无</span></div>
							<div class="info-line">运费：<span class="c6	">¥0.00</span></div>
							<div class="info-line">合计：<b class="fz18 cr">{{session('countMoney')}}</b></div>
						</div>
					</div>
					<div class="shop-title" style='margin-bottom:17px'>买家留言</div><br>
							<input type="text" name="msg" style='width:350px;' maxlength='20' placeholder="说点什么吧。。。">
						</div>
					<div class="shop-title">确认订单</div>
					<div class="pay-mode__box">
						<div class="radio-line gi radio-box">
							<label class="radio-label">
								<input name="pay-mode" value="1" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<span class="fz16">余额支付</span><span class="fz14"></span>
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{session('countMoney')}}</b>元</div>
						</div>
						<div class="radio-line gi radio-box">
							<label class="radio-label">
								<input name="pay-mode" value="2" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/home/images/icons/alipay.png" alt="支付宝支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{session('countMoney')}}</b>元</div>
						</div>
						<div class="radio-line gi radio-box">
							<label class="radio-label">
								<input name="pay-mode" value="3" autocomplete="off" type="radio"><i class="iconfont icon-radio"></i>
								<img src="/home/images/icons/paywechat.png" alt="微信支付">
							</label>
							<div class="pay-value">支付<b class="fz16 cr">{{session('countMoney')}}</b>元</div>
						</div>
					</div>
					{{csrf_field()}}
					<div class="user-form-group shopcart-submit">
						<button type="button" class="btn">确定支付</button>
					</div>
					<script>
						$('.gi').click(function(){
							$(this).addClass('active').siblings().removeClass('active');
						})

						$('.gi').click(function(){
							$('.btn').attr('type','submit');
						})

						
					</script>
				</form>
			</div>
		</section>
	</div>
@stop

@section('js')

@stop