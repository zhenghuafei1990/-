@extends('layout.home')


@section('title',$title)


@section('content')

<div class="top-nav bg3" style="position: absolute;margin-left: 120px">
	<div class="nav-box inner">
		<div class="all-cat">
			<div class="title"><i class="iconfont icon-menu"></i> 全部分类</div>
		</div>
		<ul class="nva-list">
			<a href="index.html"><li>首页</li></a>
			<a href="temp_article/udai_article10.html"><li>企业简介</li></a>
			<a href="temp_article/udai_article5.html"><li>新手上路</li></a>
			<a href="/home/video"><li class="active">万购视频</li></a>
			<a href="enterprise_id.html"><li>企业账号</li></a>
			<a href="udai_contract.html"><li>诚信合约</li></a>
			<a href="item_remove.html"><li>实时下架</li></a>
		</ul>
	</div>
</div>

<section class="panel__div clearfix" style="width: 1200px;margin-left: 120px;margin-top: 50px">
	<div class="filter-value">
		<div class="filter-title">视频专区</div>
	</div>
	<div class="video-list_div">
		@foreach($video as $k => $v)
		<div class="video-box">
			<div class="img" gid='{{$v->id}}' data-toggle="modal" data-target="#video-modal" data-id="1" data-video="{{$v->url}}"><img src="{{$v->image}}" alt="万购小视频" class="cover"></div>
			<div class="buttom">
				<div class="title ep">{{$v->vname}}</div>
				<div class="price">免费学习</div>
			</div>
		</div>

		@endforeach
		<div id="dvs" style="display: none;position:absolute;margin-left:150px;z-index:10;width: 900px;background:#eee;padding: 15px;padding-top: 1px;border-radius:20px">

			<div style="width:870px;">
				<span id='spans' style='width:60px;margin-left:810px'>关闭视频</span>
			</div>

			<video id="video" width="870" controls="" preload="metadata" data-id="" src="" poster=""></video>
		</div>
		

	</div>

	
	<script>
		$(function() {
			$('#video-modal').on('show.bs.modal', function (e) {
				if ($('#video').data('id') != $(e.relatedTarget).data('id')) {
					 $('#video').data('id',$(e.relatedTarget).data('id'));
					$('#video').attr({
						'src': $(e.relatedTarget).data('video'),
						'poster': $(e.relatedTarget).find('img').attr('src')
					});
				};
				if ($('.auto-play').hasClass('active')) {
					$('#video').get(0).play()
				};
			});
			$('.auto-play').click(function() {
				$(this).toggleClass('active')
			});
			$('#video-modal').on('hide.bs.modal', function (e) {
				$('#video').get(0).pause();
			});
		});
	</script>
</section>
@stop



@section('js')
<script>
	
	$('.img').click(function(){
		$('#dvs').css('display','block');

		var id = $(this).attr('gid');

		$.get('/home/video/select',{id:id},function(data){
			if(data){
				$('#video').attr('src',data['url']);
			}
		});

	});

	$('#spans').hover(function(){

		$(this).css('cursor','pointer');

	},function(){
		$(this).css('cursor','');

	});


	$('#spans').click(function(){

		$(this).parent().parent().css('display','none');

		$('#video').attr('src','');

	});
</script>

@stop