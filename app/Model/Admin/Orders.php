<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'orders';

    //主键
    protected $primaryKey = 'id';

    /**
     * 获得订单号里的商品
     */
    public function deta()
    {
        return $this->hasMany('App\Model\Admin\Details','oid');
    }

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

}