<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\Goods;
use App\Model\Admin\Goodsimg;

use App\Model\Admin\Cate;
use DB;
class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //获取商品图片

        //多条件查询
        $rs = Goods::orderBy('id','asc')
        ->where(function($query) use($request){
            //检测关键字
            $gname = $request->input('gname');
            $addtime = $request->input('addtime');

            //如果用户名不为空
            if(!empty($gname)) {
                $query->where('gname','like','%'.$gname.'%');
            }
            //如果权限不为空
            //?单纯的搜索权限 怎么解决?
            if(!empty($addtime)) {
                $query->where('addtime','like','%'.$addtime.'%');                        
            }

        })
        ->paginate($request->input('num', 8));      
            
        return view('admin.goods.index',[
            'title'=>'商品列表页',
            'rs'   =>$rs,
            'request'=>$request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rs=Cate::select(DB::raw('*,concat(path,tid) as paths'))->orderBy('paths')->get();
        foreach($rs as $k=>$v){
            $n = substr_count($v->path,',')-1;
            $v->tname = str_repeat('&nbsp;',$n*8).'|--'.$v->tname;
        }
        return view('admin.goods.add',[
            'title'=>'商品的添加页面',
            'rs'=>$rs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1.表单验证
        $this->validate($request, [
             'gname' => 'required|regex:/[\x{4e00}-\x{9fa5}]+/u',
             'price' => 'required|integer',
             'stock' => 'required|regex:/^[1-9]\d*$/'
        ],[
             'gname.required'=>'商品名称不能为空',
             'price.required'=>'价格不能为空',
             'stock.required'=>'库存不能为空',
             'gname.regex'=>'商品名称字数不能少于5位多于20位',            
             'price.integer'=>'价格格式不正确',
             'stock.regex'=>'库存格式不正确'
        ]);
       //获取提交过来的数据
        $rs = $request->except('_token','gpic','picture');
       
        //处理商品主图
        if($request->hasFile('picture')){
                //随机生成文件名
                $name = time().mt_rand(1111,9999);
                //获取文件后缀
                $suf = $request->file('picture')->getClientOriginalExtension();
                //将文件拼接后移入到upload/goods文件夹下  
                 $request->file('picture')->move('uploads/goods/master/',$name.'.'.$suf);
        }
        $rs['picture'] = 'uploads/goods/master/'.$name.'.'.$suf;

        $data = Goods::create($rs);

        $id = $data->id;
        $gd = $data::find($id);
        //处理图片
        if($request->hasFile('gpic')){
            $files = $request->file('gpic');

            $gm = [];
            foreach($files as $k=>$v){
                $info = [];
                //随机生成文件名
                $gname = time().mt_rand(1111,9999);
                //获取文件后缀
                $suffix = $v->getClientOriginalExtension();
                //将文件拼接后移入到upload/goods文件夹下  
               $v->move('uploads/goods/',$gname.'.'.$suffix);

                $info['gpic'] = 'uploads/goods/'.$gname.'.'.$suffix;
                $gm[] = $info;
            }
        }
        //关联模型`
       
        try{
            
            $cds = $gd->gimgs()->createMany($gm);
            if($cds){
                return redirect('/admin/goods')->with('success','添加成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //根据id获取存储图片的路经信息

        //删除数据表里面的图片信息   还删除uploads信息吗??
        $info = Goodsimg::find($id);
       
        $path = $info->gpic;
        $data = unlink('./'.$path);

        if(!$data){

            return back()->with('error','删除图片失败');
        }

        $rs = Goodsimg::where('id',$id)->delete();

        if(!$rs){

            return back()->with('error','删除数据失败');
        }

        echo 1;
    }

    public function picture($id)
    {
         //根据id获取存储图片的路经信息
        //删除数据表里面的图片信息   还删除uploads信息吗??
        $info = Goods::find($id);
       
        $path = $info->picture;

        $data = unlink('./'.$path);

        if(!$data){

            return back()->with('error','删除图片失败');
        }

        echo 1;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $rs = Cate::select(DB::raw('*,concat(path,tid) as paths'))->
        orderBy('paths')->get();

         foreach($rs as $k => $v){
            //path  0,1,4

            $n = substr_count($v -> path, ',') - 1;

            $v->tname = str_repeat('&nbsp;', $n * 8).'|--'.$v -> tname;

            // $v->catename = str_repeat('|--', $n).$v -> catename;
        }
        /*dd($id);*/

        $res = Goods::find($id);

        //根据id查询相关的商品图片信息
        $gimg = Goodsimg::where('gid',$id)->get();
        /*$gimg = $gimg->toArray();*/
        return view('admin.goods.edit',[
            'title'=>'商品的修改页面',
            'rs'=>$rs,
            'res'=>$res,
            'gimg'=>$gimg
        ]);

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
        //1.表单验证
        $this->validate($request, [
             'gname' => 'required|regex:/[\x{4e00}-\x{9fa5}]+/u',
             'price' => 'required|integer',
             'stock' => 'required|regex:/^[1-9]\d*$/',
             'picture' => 'file',
             'gipc'  => 'file'
        ],[
             'gname.required'=>'商品名称不能为空',
             'price.required'=>'价格不能为空',
             'stock.required'=>'库存不能为空',
             'picture.file'=>'主图不能为空',
             'gpic.file'=>'商品图片至少上传一张',
             'gname.regex'=>'商品名称字数不能少于5位多于20位',            
             'price.integer'=>'价格格式不正确',
             'stock.regex'=>'库存格式不正确',             
        ]);

        //获取表单信息
     
         $res = $request->except('_token','gpic','picture','_method');
        //处理图片
        if($request->hasFile('gpic')){
            $files = $request->file('gpic');

            $gm = [];
            foreach($files as $k => $v){

                $info = [];

                $gname = time().mt_rand(1111,9999);

                $suffix = $v->getClientOriginalExtension();

                $v->move('uploads/goods/',$gname.'.'.$suffix);

                $info['gid'] = $id;

                $info['gpic'] = 'uploads/goods/'.$gname.'.'.$suffix;

                $gm[] = $info;
            }
        }

         //文件上传   商品详情的图片       
         DB::table('goodspicture')->insert($gm);
        
        //处理商品主图
        if($request->hasFile('picture')){
                //随机生成文件名
                $name = time().mt_rand(1111,9999);
                //获取文件后缀
                $suf = $request->file('picture')->getClientOriginalExtension();
                //将文件拼接后移入到upload/goods文件夹下  
                 $request->file('picture')->move('uploads/goods/master/',$name.'.'.$suf);
        }
        $res['picture'] = 'uploads/goods/master/'.$name.'.'.$suf;
          //添加数据
       
        try{
            
            $data = DB::table('goods')->where('id',$id)->update($res);

            if($data){

                return redirect('/admin/goods')->with('success','修改成功');
            }
        }catch(\Exception $e){

            return back()->with('error','修改失败'); 

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //根据id获取图片的路径 unlink
        $res = Goodsimg::where('gid',$id)->get();

        // dd($res);

        foreach($res as $k=>$v){
            $path = $v->gpic;
            $info = unlink('./'.$path);
        }
       /*试验报错
       //删除主图的图片
        $re = Goods::where('id',$id)->get();
        $pic = $re->picture; 
        $pi= unlink('./'.$pic); 

        //删除详情页图片
        $cont = $re->content;
        $con = unlink('./'.$con); */
        //
        //判断
        // if()

        //关联删除   删除商品的信息  goods 
        $goods = Goods::find($id);

        $goods->delete();
        //删除商品的图片的信息  goodsimg
        try{
            //关联模型
            $rs = $goods->gimgs()->delete();

            if($rs){

                return redirect('/admin/goods/')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }


    }
}
