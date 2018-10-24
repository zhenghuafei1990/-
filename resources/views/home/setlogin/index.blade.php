<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/iconfont.css">
	<link rel="stylesheet" href="css/global.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/login.css">
	<script src="js/jquery.1.12.4.min.js" charset="UTF-8"></script>
	<script src="js/bootstrap.min.js" charset="UTF-8"></script>
	<script src="js/jquery.form.js" charset="UTF-8"></script>
	<script src="js/global.js" charset="UTF-8"></script>
	<script src="js/login.js" charset="UTF-8"></script>
	<title>万购网 - 登录 / 注册</title>
</head>
<body>
	<div class="public-head-layout container">
		<a class="logo" href="/"><img src="/logo/logo.png" alt="万购网" class="cover"></a>
	</div>
	<div style="background:url(images/login_bg.jpg) no-repeat center center; ">
		<div class="login-layout container">
			<div class="form-box login" style="display: block">
				<div class="tabs-nav">

@if(count($errors) > 0)						
	<div class="alert-danger">
	  <ul>
	  	@foreach ($errors->all() as $error)
	  		<li>{{$error}}</li>
		@endforeach
	  </ul>
	</div>
@endif	

@if(session('error'))
<div class="alert alert-danger" role="alert">
	{{session('error')}}
</div>
@endif				
					<h2>请输入用户名和手机号进行验证</h2>
				</div>
				<div class="tabs_container">
					<form class="tabs_form" action="/home/dosetlogin" method="post" id="login_form">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								</div>
								<input class="form-control phone" name="mname" id="login_phone" required placeholder="用户名" autocomplete="off" type="text">
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								</div>
								<input class="form-control phone" name="phone" id="login_phone" required placeholder="手机号" maxlength="11" autocomplete="off" type="text">
							</div>
						</div>

						<div class="checkbox">
	         
	                        <a href="/home/login" class="pull-right" id="resetpwd">返回登录</a>
	                    </div>
						
						
						<div class="checkbox">
	         
	                    </div>
	                    <!-- 错误信息 -->
						<div class="form-group">
							<div class="error_msg" id="login_error">
								
							</div>
						</div>
						{{csrf_field()}}
						{{method_field('PUT')}}
	                    <button type="submit" class="btn btn-large btn-primary btn-lg btn-block submit" id="login_submit">登录</button><br>
	                    <p class="text-center">没有账号？<a href="/home/message">免费注册</a></p>
                    </form>
                    <div class="tabs_div">
	                    <div class="success-box">
	                    	<div class="success-msg">
								<i class="success-icon"></i>
	                    		<p class="success-text">登录成功</p>
	                    	</div>
	                    </div>
	                    <div class="option-box">
	                    	<div class="buts-title">
	                    		现在您可以
	                    	</div>
	                    	<div class="buts-box">
	                    		<a role="button" href="/home/index" class="btn btn-block btn-lg btn-default">继续访问商城</a>
								<a role="button" href="udai_welcome.html" class="btn btn-block btn-lg btn-info">登录会员中心</a>
	                    	</div>
	                    </div>
                    </div>
                </div>
			</div>
		
		</div>
	</div>
	<div class="footer-login container clearfix">
		<ul class="links">
			<a href=""><li>网店代销</li></a>
			<a href=""><li>U袋学堂</li></a>
			<a href=""><li>联系我们</li></a>
			<a href=""><li>企业简介</li></a>
			<a href=""><li>新手上路</li></a>
		</ul>
		<!-- 版权 -->
		<p class="copyright">
			© 2005-2017 U袋网 版权所有，并保留所有权利<br>
			ICP备案证书号：闽ICP备16015525号-2&nbsp;&nbsp;&nbsp;&nbsp;福建省宁德市福鼎市南下村小区（锦昌阁）1栋1梯602室&nbsp;&nbsp;&nbsp;&nbsp;Tel: 18650406668&nbsp;&nbsp;&nbsp;&nbsp;E-mail: 18650406668@qq.com
		</p>
	</div>
</body>
</html>