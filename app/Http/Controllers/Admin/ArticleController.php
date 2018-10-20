<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Model\Admin\Article;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $wname = $request->input('wname');
        $num = $request->input('num',10);
        $rs = Article::where('wname','like','%'.$wname.'%')->paginate($num);

         return view('admin/article/index',[
            'title'=>'文章列表页',
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
        //显示表单
        return view('admin/article/add',['title'=>'文章的添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $res = $request->except('_token');

        $res['wtime'] = date(time());

        try{
            $rs = Article::create($res);
            if($rs){
                return redirect('/admin/article')->with('success','修改成功');
            }
        }catch(\Exception $e){
            return back()->with('error','修改失败');
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
         //根据id获取数据
        $res = Article::where('wid',$id)->first();
        //dd(decrypt($res['password']));

        
        return view('admin/article/edit',[
                    'title'=>'文章的修改页面',
                    'res'  =>$res,
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
      
        $res = $request->except('_token','_method');
      
        try{
          $rs = DB::table('article')->where('wid',$id)->update($res);
            if($rs){
                return redirect('/admin/article')->with('success','修改成功');
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
        try{
            $res = Article::where('wid',$id)->delete();
            if($res){
                return redirect('/admin/article')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','添加失败');
        }
    }
}
