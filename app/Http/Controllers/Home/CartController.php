<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Home\Cart;
use DB;

class CartController extends Controller
{
    public function remove(Request $request)
    {
        $gid = $request->gid;

        $data = DB::table('cart')->where('gid',$gid)->delete();

        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mid = session('mid');
        $rs = Cart::where('mid',$mid)->get();

        return view('/home/cart/index',[
            'title'=>'购物车管理',
            'rs'=>$rs
        ]);
    }

    /**
     * 添加到购物车
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cart = [];
        $cart['name'] = Goods::where('id',$id)->first()->gname;
        $cart['price'] = Goods::where('id',$id)->first()->price;
        $cart['gimg'] = Goods::where('id',$id)->first()->picture;
        $cart['mid'] = session('mid');
        $cart['gid'] = $id;
        // dd($cart);
         
        try{
           $rs = Cart::create($cart);

            if($rs){
                return redirect('/home/cart');
            }

        }catch(\Exception $e){

            return back();

        }





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
    public function show($id)
    {
        //
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
    public function destroy($gid)
    {
        
    }
}
