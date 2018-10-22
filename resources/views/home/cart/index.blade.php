@extends('layout.carts')

@section('title',$title)

@section('content')
	<div class="content clearfix bgf5 shop">
		<section class="user-center inner clearfix">
			<div class="user-content__box clearfix bgf">
				<div class="title">购物车</div>
				<form action="/home/order" class="shopcart-form__box" method="post" id="cart">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="150">
									<a href="javascript:void(0)" class='as'>全选</a>
								</th>
								<th width="300">商品信息</th>
								<th width="150">单价</th>
								<th width="200">数量</th>
								<th width="200">小计</th>
								<th width="80">操作</th>
							</tr>
						</thead>
						<tbody>
							@foreach($rs as $k=>$v)
							<tr class='cart_item' id='{{$v->id}}'>
								<th scope="row">

									<label class="checked-label"><input type="checkbox" class='ches' gid='{{$v->gid}}'><i></i>

										<div class="img"><img src="{{$v->gimg}}" alt="" class="cover"></div>
									</label>
								</th>
								<td>
									<div class="name ep3">{{$v->name}}</div>
								</td>
								<td>￥<span class='price'>{{$v->price}}</span></td>
								<td>
									<div class="cart-num__box">
										<input type="button" class="sub" value="-">
										<input type="text" class="val" value="1" maxlength="2">
										<input type="button" class="add" value="+">
									</div>
								</td>
								<td>
									￥<span class='dollar'>{{$v->price}}</span>
								</td>
								<td>
									<a href="javascript:void(0)" class='remove'>删除</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="user-form-group tags-box shopcart-submit pull-right">
						<button class="btn" style='color:white' id="submit">提交订单</button>
						{{csrf_field()}}
					</div>
					<div class="checkbox shopcart-total">
						<!-- <label><input type="checkbox" class="check-all"><i></i> 全选</label> -->
						<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="">删除</a> -->
						<div class="pull-right">
							<!-- 已选商品 <span>2</span> 件 -->
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;合计（不含运费）
							<b class="cr">¥<span class="fz24" id="count">0.0</span></b>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
	<style type="text/css">
	.cart-empty{
			height: 498px;
		    padding: 80px 0 120px;
		    color: #333;
		}
		.cart-empty .message{
			height: 98px;
		    padding-left: 341px;
		    background: url(/home/images/no-login-icon.png) 250px 22px no-repeat;
		}
		.ftx-05{
			color: #005ea7;
		}
		ol, ul {
		    list-style: outside none none;
		}
		.gwc{
			display:none;
		}
		.cart-empty .message li {
		    line-height: 38px;
		}
		.cart-empty .message .txt {
		    font-size: 14px;
		}
	</style>
	<div class="cart-empty gwc">
	    <div class="message">
	        <ul>
	            <li class="txt" style='font-size: 14px;'>
	                购物车空空的哦~，去看看心仪的商品吧~
	            </li>
	            <li class="mt10">
	                <a href="/" class="ftx-05">
	                    去购物&gt;
	                </a>
	            </li>
	        </ul>
	    </div>
	</div>
@stop

@section('js')
<script src='/home/js/jquery-3.2.1.min.js'></script>
<script type="text/javascript">
	//加法运算
	$('.add').click(function(){
		var nums = $(this).prev().val();
		nums++;
		$(this).prev().val(nums);
	//获取单价
	var prices = $(this).parents('tr').find('.price').text();

	function accMul(arg1, arg2) {

	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

	        try { m += s1.split(".")[1].length } catch (e) { }

	        try { m += s2.split(".")[1].length } catch (e) { }

	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
		}

		//让小计发生改变
		$(this).parents('tr').find('.dollar').text(accMul(prices,nums));
		totals()
	})	

	//减法
	$('.sub').click(function(){
		var nums = $(this).next().val();
		nums--;
		if(nums <= 1){

			nums = 1;
		}

		$(this).next().val(nums);

		//获取单价
		var prices = $(this).parents('tr').find('.price').text();

		function accMul(arg1, arg2) {

	        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

	        try { m += s1.split(".")[1].length } catch (e) { }

	        try { m += s2.split(".")[1].length } catch (e) { }

	        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)
		}

		//让小计发生改变
		$(this).parents('tr').find('.dollar').text(accMul(prices,nums));
		totals()

	})

	//选中让总计发生改变
	$('.ches').click(function(){

		totals()
	})
	//封装
	function totals()
	{
		var nms = 0;
		$(':checkbox:checked').each(function(){
			var pr = Number($(this).parents('tr').find('.dollar').text());

			function accAdd(arg1,arg2){  
			    var r1,r2,m;  
			    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
			    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
			    m=Math.pow(10,Math.max(r1,r2))  
			    return (arg1*m+arg2*m)/m  
			}
			nms = accAdd(pr,nms)
		})
		//小计加起来的和 给到总计
		$('.fz24').text(nms);
	}

	//全选
	$('.as').click(function(){
		$('.ches').attr('checked',true);

		totals()
	})

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	//删除商品
	$('.remove').click(function(){

		//提示的删除信息
		var info = confirm('你确定删除该商品吗?');

		if(!info) return;

		var trs = $(this);

		//获取id
		var gid = $(this).parents('tr').find('.ches').attr('gid');

		$.post('/homes/cart/remove',{gid:gid},function(data){
			if(data == '1'){

				trs.parents('tr').remove();

				totals()

				var gd = $('.cart_item').find('.ches').attr('gid');

				// console.log(gd);

				if(gd == undefined){

					location.reload(true);
				}
			}
		})
	})

	var gd = $('.cart_item').find('.ches').attr('gid');

	if(gd == undefined){

		$('.gwc').show();

		$('.shop').hide();
	}
 	
$(function(){
	$('#submit').click(function () {
		// 获取token值
		var token = $('meta[name=csrf-token]').attr('content');
		// 获取请求的url地址
		var url = window.location.origin + '/home/order/setinfo';
		

		// 获取所有商品小计的总和
		var total = $('#count').text();

		// 表单是否提交

		var flag = false; 
		var info = getInfo();
		console.log(info);
		if (!info.length) {
			return false;
		}

		// 发送ajax
		$.ajax({
			url: url,
			type:'post',
			dataType:'json',
			async: false,
			data:{
				info: info,
				total:  total,
				_token: token
			},
			success: function(data){
				// 成功
				if (data == 1) {
					flag = true;
				}
			},
		})
		return flag;
	});



	/**
	 * 获取所有被选中的商品信息
	 */
	function getInfo() {
		// 获取被选中的 多选框
		var checkedBox = [];

		// 获取所有的 多选框
		var boxList = $("input[type=checkbox]");
		boxList.each(function(i) {
			if ( boxList[i].checked ) {
				checkedBox.push( $(boxList[i]) );
			}
		});

		var goodInfo = [];
		// 遍历被选中的 多选框, 获取信息
		for (var i = 0; i < checkedBox.length; i++) {
			goodInfo[i] = getGoodsInfo(checkedBox[i]);
		}
		return goodInfo;
	}

	function getGoodsInfo(obj) {
		// 获取tr标签
		var tr = obj.parents('.cart_item');
		
		return {
			// 获取图片路径
			img: tr.find('.cover').attr('src'),
			// 获取商品名称
			name: tr.find('.name').text(),
			// 获取商品数量
			count :tr.find('.cart-num__box .val').val(),
			// 获取商品小计
			dollar: tr.find('.dollar').text(),
			id: tr.attr('id'),
			gid:tr.find('.ches').attr('gid'),

		};
	}

});
 	

</script>

@stop
