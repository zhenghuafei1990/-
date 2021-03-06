<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//前台首页
// Route::get('/', function () {
//     return view('Home\IndexController@index');
// });

//前台首页
Route::get('/','Home\IndexController@index');

//后台登录
Route::any('/admin/login','Admin\LoginController@login');                         
Route::any('/admin/dologin','Admin\LoginController@dologin');
Route::any('/admin/cap','Admin\LoginController@cap');


//后台管理
Route::group(['middleware'=>'adminlogin'],function(){

	//后台首页
	Route::any('admin','Admin\IndexController@index');
//后台的用户模块
	Route::resource('admin/user','Admin\UserController');
//修改头像
	Route::any('admin/profile','Admin\LoginController@profile');
	Route::any('admin/doprofile','Admin\LoginController@doprofile');	

	//修改密码
	Route::any('admin/pass','Admin\LoginController@pass');
	Route::any('admin/dopass','Admin\LoginController@dopass');

	//退出后台
	Route::any('admin/logout','Admin\LoginController@logout');


	//后台的分类模块
	Route::resource('/admin/cate','Admin\CateController');

	//后台的前台用户信息表
	Route::resource('admin/message','Admin\MessageController');
	
	//后台广告管理模块
	Route::resource('admin/poster','Admin\PosterController');

	//后台收货人管理
	Route::resource('admin/usershome','Admin\UsershomeController');

	//后台的文章模块
	Route::resource('admin/article','Admin\ArticleController');

	//后台轮播模块
	Route::resource('admin/lunbo', 'Admin\LunboController');

	//友情链接
	Route::resource('admin/friend', 'Admin\FriendController');

	//商品推荐
	Route::resource('admin/ecommend', 'Admin\EcommendController');

	//热卖商品
	Route::resource('admin/selling', 'Admin\SellingController');

	//后台的商品模块
	Route::resource('/admin/goods','Admin\GoodsController');

	//后台商品主图删除
	Route::any('/admin/goods/picture/{id}','Admin\GoodsController@picture');

	//后台订单管理
	Route::resource('admin/orders','Admin\OrdersController');

	//后台发货
	Route::any('/admin/orders/send/{id}','Admin\OrdersController@send');

	//后台查看评论
	Route::any('/admin/comment/index','Admin\CommentController@index');

	//后台退货管理
	Route::any('/admin/retreat/index','Admin\RetreatController@index');

	//后台退货
	Route::any('/admin/retreat/send/{id}','Admin\RetreatController@send');

	//后台视频管理
	Route::resource('admin/video','Admin\VideoController');

});


	//前台登录
	Route::any('home/login','Home\LoginController@login');
	Route::any('home/dologin','Home\LoginController@dologin');
	Route::any('home/empty','Home\LoginController@empty');

	//前台忘记密码
	Route::any('home/setlogin','Home\SetloginController@index');
	Route::any('home/dosetlogin','Home\SetloginController@dosetlogin');
	Route::any('home/set','Home\SetloginController@set');
	Route::any('home/setpass','Home\SetloginController@setpass');


	//前台注册
	Route::any('home/message','Home\MessageController@index');
	Route::any('home/message/create','Home\MessageController@create');
	Route::any('home/message/youxiang','Home\MessageController@youxiang');
	Route::any('home/message/jihuo','Home\MessageController@jihuo');

	//发送密码重置链接路由
	Route::get('password/email', 'Auth\PasswordController@getEmail');

	//推荐商品
	Route::any('/home/ecommend/{id}','Home\EcommendController@ecommend');

	//热卖商品
	Route::any('/home/selling','Home\SellingController@selling');

	//前台商品列表页
	Route::any('/home/goods/list/{id}','Home\GoodsController@list');

	//前台商品详情页
	Route::any('/home/goods/details/{id}','Home\GoodsController@details');

	//前台视频页面
	Route::any('/home/video','Home\VideoController@index');
	Route::any('/home/video/select','Home\VideoController@select');
	Route::any('/home/video/remove','Home\VideoController@remove');

	//前台文章
	Route::any('home/article/{id}','Home\ArticleController@index');

	//密码重置路由
	Route::get('home/password','Home\ForgotPasswordController@getReset');
	Route::post('home/forgotpassword','Home\ForgotPasswordController@postReset');

	//将数据存入到session
	Route::any('/home/order/setinfo','Home\OrdersController@setinfo');

	//前台商品搜索
	Route::any('/home/goods/search','Home\GoodsController@search');
	//前台商品主类别列表页
	Route::any('/home/goods/floor/{id}','Home\GoodsController@floor');
	//前台商品主类详情页
	Route::any('/home/goods/floor_details/{id}','Home\GoodsController@floor_details');
	//前台商品列表页
	Route::any('/home/goods/list/{id}','Home\GoodsController@list');
	//前台商品详情页
	Route::any('/home/goods/details/{id}','Home\GoodsController@details');


Route::group(['middleware' => 'checklogin'],function(){


	//前台个人中心+个人资料
	Route::any('home/usershome','Home\UsershomeController@index');
	Route::any('home/usershome/indexupload/{id}','Home\UsershomeController@indexupload');

	//前台个人中心收货地址
	Route::any('home/usershome/caddr','Home\UsershomeController@caddr');
	Route::any('home/usershome/caddrcreate','Home\UsershomeController@caddrcreate');
	Route::any('home/usershome/delete/{id}','Home\UsershomeController@delete');
	Route::any('home/usershome/edit/{id}','Home\UsershomeController@edit');
	Route::any('home/usershome/upload/{id}','Home\UsershomeController@upload');
	Route::any('home/usershome/delete/{id}','Home\UsershomeController@delete');

	//加入购物车
	Route::any('/home/cart/create/{id}','Home\CartController@create');

	//前台购物车管理
	Route::any('/home/cart','Home\CartController@index');

	//前台购物车删除
	Route::any('/home/cart/remove','Home\CartController@remove');

	
	//前台结算中心
	Route::any('/home/order','Home\OrdersController@getinfo');

	//前台结算成功页面
	Route::any('/home/order/success','Home\OrdersController@success');

	//前台订单页
	Route::any('/home/orders','Home\OrdersController@index');

	//前台订单详情页
	Route::any('/home/order/{id}','Home\OrdersController@show');

	//前台交易完成
	Route::any('/home/order/finish/{id}','Home\OrdersController@finish');

	//无效订单
	Route::any('/home/order/invalid/{id}','Home\OrdersController@invalid');

	//评论管理
	Route::any('/home/comment/comments/{id}','Home\CommentController@comments');

	//添加评论
	Route::any('/home/comment/create/{id}','Home\CommentController@create');

	//申请退货
	Route::any('/home/retreat/retreat/{id}','Home\RetreatController@retreat');
	Route::any('/home/retreat/create/{id}','Home\RetreatController@create');

	//退货页面
	Route::any('/home/retreat/index','Home\RetreatController@index');
	
	Route::any('/home/comment/create/{id}','Home\CommentController@create');
	
	//前台视频页面
	Route::any('/home/video','Home\VideoController@index');
	Route::any('/home/video/select','Home\VideoController@select');

	Route::any('/home/video/remove','Home\VideoController@remove');

});



