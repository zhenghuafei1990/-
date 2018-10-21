<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Ecommend extends Model
{
    //
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goods';

    //主键
    protected $primaryKey = 'id';

    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
	 * 不可被批量赋值的属性。
	 *
	 * @var array
	 */
	protected $guarded = [];


    /**
     * 获得与商品关联的图片
     */
    public function ecommend()
    {
       return $this->hasMany('App\Model\Admin\Ecommedspicture', 'gid');
    }
}