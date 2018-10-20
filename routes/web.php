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

	//后台的分类模块
	Route::resource('/admin/cate','Admin\CateController');

	//后台的购买用户信息表
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




});


Route::group([],function(){

	//前台登录
	Route::any('home/login','Home\LoginController@login');
	Route::any('home/dologin','Home\LoginController@dologin');
	Route::any('home/empty','Home\LoginController@empty');


	//前台注册
	Route::any('home/message','Home\MessageController@index');
	Route::any('home/message/create','Home\MessageController@create');
	Route::any('home/message/youxiang','Home\MessageController@youxiang');
	Route::any('home/message/jihuo','Home\MessageController@jihuo');

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

	// 发送密码重置链接路由
	Route::get('password/email', 'Auth\PasswordController@getEmail');
	
	// 密码重置路由
	Route::get('home/password', 'Home\ForgotPasswordController@getReset');
	Route::post('home/forgotpassword', 'Home\ForgotPasswordController@postReset');

	//前台文章
	Route::any('home/article','Home\ArticleController@index');
	Route::any('home/article/{wid}','Home\ArticleController@title');

	//前台购物车管理
	Route::any('/home/cart','Home\CartController@index');
	//前台购物车删除
	Route::any('/home/cart/remove','Home\CartController@remove');
	//将数据存入到session
	Route::any('/home/order/setinfo','Home\OrdersController@setinfo');
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
	//查看评论
	Route::any('/home/comment/index/{id}','Home\CommentController@index');
	//删除评论
	Route::any('/home/comment/delete/{id}','Home\CommentController@delete');
	//申请退货
	Route::any('/home/retreat/retreat/{id}','Home\RetreatController@retreat');
	Route::any('/home/retreat/create/{id}','Home\RetreatController@create');
	//退货页面
	Route::any('/home/retreat/index','Home\RetreatController@index');

	Route::any('/home/comment/create/{id}','Home\CommentController@create');

	//前台商品列表页
	Route::any('/home/goods/list/{id}','Home\GoodsController@list');
	//前台商品详情页
	Route::any('/home/goods/details/{id}','Home\GoodsController@details');


});



