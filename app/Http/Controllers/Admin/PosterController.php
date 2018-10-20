<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Poster;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $rs = Poster::orderBy('posterid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $postername = $request->input('postername');
                //如果用户名不为空
                if(!empty($postername)) {
                    $query->where('postername','like','%'.$postername.'%');
                }
            })
            ->paginate($request->input('num', 5));

        return view('admin.poster.index',[
            'title'=>'广告浏览管理',
            'rs'=>$rs,
            'request'=>$request

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.poster.add',['title'=>'广告添加管理']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $request->except('_token');

        $res['addtime'] = date(time());

        $res['url'] = 'http://'.$res['url'];


        if($request->hasFile('image')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('image')->getClientOriginalExtension();
            //移动
            $request->file('image')->move('uploads/guanggao',$name.'.'.$suffix);
            
            $res['image'] = '/uploads/guanggao/'.$name.'.'.$suffix;
        } else {

            $session['error'] = '图片不能为空';
        }


        try{
            $rs = Poster::create($res);

            if($rs){
                return redirect('/admin/poster')->with('success','添加成功');
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
        //根据id获取数据
        $res = Poster::where('posterid',$id)->first();

        return view('admin.poster.edit',[
            'title'=>'用户的修改页面',
            'res'=>$res
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
        // 获取数据
        $rs = Poster::where('posterid',$id)->first();

        $image = $rs->image; 

        //表单验证

       
        $res = $request->except('_token','_method');

        //文件上传
        if($request->hasFile('image')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('image')->getClientOriginalExtension();
            //移动
            $request->file('image')->move('uploads/guanggao',$name.'.'.$suffix);
            
            $res['image'] = '/uploads/guanggao/'.$name.'.'.$suffix;

            if($res['image']){
                unlink('.'.$image);
            }
        }


        

        try{
            $rs = Poster::where('posterid',$id)->update($res);
            if($rs){
                return redirect('/admin/poster')->with('success','修改成功');
            }
        }catch(\Exception $e){
            return redirect('/admin/poster')->with('error','修改失败');
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
        //
        try{
            $res = Poster::where('posterid',$id)->delete();
            if($res){
                return redirect('/admin/poster')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }
    }
}
