<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Admin\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $video = Video::orderBy('id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $vname = $request->input('vname');
                //如果用户名不为空
                if(!empty($vname)) {
                    $query->where('vname','like','%'.$vname.'%');
                }
            })
            ->paginate($request->input('num','3'));

        return view('admin.video.index',[
            'title'=>'视频的管理页面',
            'video'=>$video,
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
        return view('admin.video.add',['title'=>'视频添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = $request->except('_token');

        if($request->hasFile('image')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('image')->getClientOriginalExtension();
            //移动
            $request->file('image')->move('uploads/video/image',$name.'.'.$suffix);
            
            $video['image'] = '/uploads/video/image/'.$name.'.'.$suffix;
        }

        if($request->hasFile('url')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('url')->getClientOriginalExtension();
            //移动
            $request->file('url')->move('uploads/video',$name.'.'.$suffix);
            
            $video['url'] = '/uploads/video/'.$name.'.'.$suffix;
        }

        try{
            $rs = Video::create($video);

            if($rs){
                return redirect('/admin/video')->with('success','添加成功');
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
        $video = Video::where('id',$id)->first();

        return view('admin.video.edit',[
            'title'=>'视频的修改页面',
            'video'=>$video
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

        $rs = Video::where('id',$id)->first();

        $image = $rs->image;
        

        $url = $rs->url;

        $video = $request->except('_token','_method');

        if($request->hasFile('image')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('image')->getClientOriginalExtension();
            //移动
            $request->file('image')->move('uploads/video/image',$name.'.'.$suffix);
            
            $video['image'] = '/uploads/video/image/'.$name.'.'.$suffix;

            if($video['image']){
                unlink('.'.$image);
            }
            
        }

        if($request->hasFile('url')){
            //自定义名字
            $name = time().rand(1111,9999);
            //获取后缀
            $suffix = $request->file('url')->getClientOriginalExtension();
            //移动
            $request->file('url')->move('uploads/video',$name.'.'.$suffix);
            
            $video['url'] = '/uploads/video/'.$name.'.'.$suffix;

            if($video['url']){
                unlink('.'.$url);
            }
            
        }
  
        try{
            $rs = Video::where('id',$id)->update($video);

            if($rs){
                return redirect('/admin/video')->with('success','修改成功');
            } else {
                return redirect('/admin/video')->with('success','未进行修改');
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
        //
        try{
            $res = Video::where('id',$id)->delete();
            if($res){
                return redirect('/admin/video')->with('success','删除成功');
            }
        }catch(\Exception $e){
            return back()->with('error','删除失败');
        }
    }
}
