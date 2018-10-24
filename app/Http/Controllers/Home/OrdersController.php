<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Orders;
use App\Model\Admin\Details;
use App\Model\Home\Cart;
use App\Model\Home\Comment;
use App\Model\Admin\Retreat;
use App\Model\Admin\Goods;
use DB;

class OrdersController extends Controller
{

    // 订单id
    protected $oid;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->oid = date('Ymd').mt_rand(10000,99999);
            return $next($request);
        });
    }

    //将商品信息存入到session中
    public function setinfo(Request $request)
    {
        // 将获取到的json字符串装换为数组
        $info = $request->input('info');
        $count = $request->input('total');


        // 存入session
        session(['goodinfo'=>$info]);
        session(['countMoney' => $count]);


        // 给ajax返回数据
        return response(1);
    }



    /**
    * 获取session中商品的总数量
    **/
    public function getGoodsCount() {
        $rs = session('goodinfo');
        // dd($rs);

        $count = 0;
        foreach ($rs as $key => $value) {
            $count += $value['count'];
        }
        return $count;
    }

    //获取用户的mid
    public function getMid()
    {
      $mid = session('mid');
      return $mid;
    }


    public function getinfo(Request $request)
    {
      $mid = session('mid');
        
        $cargood = DB::table('cargood')->where('mid',$mid)->get();

        return view('/home/order/getinfo', [
            'title' => '结算中心',
            'cargood' => $cargood
        ]);
    }


    /**
     * 订单提交成功后显示提示信息页面
    */
    public function success(Request $request)
    {
        //存入数据库详情表信息
        $this->saveDetail();
        // //存入数据库订单信息
        $this->saveOrders($request);
        
        // 查询指定订单号的订单
        $rs = Orders::where('oid',$this->oid)->first();

        //根据oid查询详情表
        $detail = Details::where('oid',$this->oid)->get()->toArray();
        // dd($detail);

        // 获取详情表里的gid
         $arr = [];
        foreach($detail as $k=>$v){
         $arr[] = $v['gid'];
        }
        // dd($arr);

        //获取详情表里的数量
        $count = [];
        foreach($detail as $k=>$v){
          $count[] = $v['count'];
        }
        // dd($count);

        //获取上面平里的库存
        $kucun = [];
        foreach($arr as $k=>$v){
          $kucun[] = Goods::where('id',$v)->first()->stock;
        }
        // dd($kucun);

        //减去库存
        $stock = [];
        foreach($kucun as $k=>$v){
          $stock[] = $kucun[$k]-$count[$k];
        }
        // dd($stock);

        //把库存存回商品表
        $c=array_combine($arr,$stock);
        // dd($c);
        foreach ($c as $k => $v) {
           Goods::where('id',$k)->update([ 'stock' => $v ]);
        }


        // 清空购物车数据库
        $this->clearCart();

        // 清空session中的数据
       session(['goodinfo'=>null]);
       session(['countMoney' => null]);

        // 返回数据
        return view('/home/order/success',[
            'title'=>'结算成功',
            'rs'=>$rs
        ]);
    }



    //订单详情表
    public function saveDetail()
    {
          // 获取订单信息
        $orderDetails = session('goodinfo');

        // 处理订单信息
        foreach ($orderDetails as $key => $value) {
            $orderDetails[$key]['oid'] = $this->oid;
            unset($orderDetails[$key]['id']);
        }
        
        // 将处理好的数据存入数据库 订单详情表
        Details::insert($orderDetails);

    }



    //存入订单表
    public function saveOrders($request) {
        $data = [
            'addtime' => date('Y-m-d H:i:s'),
            'oid'=> $this->oid,
            'mid'=>$this->getMid(),
            'oname'=> $request->input('oname'),
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone'),
            'msg' => $request->input('msg'),
            'num' => $this->getGoodsCount(),
            'total' => session('countMoney')
        ];
        Orders::create($data);

    }

    //清除购物车和session
    public function clearCart()
    {
        //获取数据
        $clear = session('goodinfo');

        //处理数据
        $clearId = [];
        foreach($clear as $k=>$v){
            $clearId[] = $clear[$k]['id'];
        }
      
        Cart::destroy($clearId);
        
    }

    //前台交易完成
    public function finish($oid)
    {
     Orders::where('oid',$oid)->update([ 'status' => 2 ]);
      return back();
    }

    //无效订单
    public function invalid($oid)
    {
     Orders::where('oid',$oid)->update([ 'status' => 3 ]);
      return back();
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $mid = session('mid');
      $did = session('did');
      $oid = session('oid');
      // dd($oid);
      //从数据库获取数据

      $detail = Details::where('oid',$oid)->orderBy('status','asc')->first();
       if($detail['status'] == 1){
        Orders::where('oid',$oid)->update(['status'=>3]);
       } 

      $order = Orders::where('mid',$mid)->orderBy('id','desc')->paginate(2);
      
       
        
      return view('/home/order/index',[
          'title'=>'我的订单',
          'order'=>$order,
          'detail'=>$detail
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($oid)
    {
        $detail = Details::where('oid',$oid)->get();
        $order = Orders::where('oid',$oid)->get();


        return view('/home/order/detail',[
            'title'=>'订单详情页',
            'detail'=>$detail,
            'order'=>$order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
