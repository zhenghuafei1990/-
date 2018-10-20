<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'comment';

    /**
     * 与模型关联的数据表的主键
     *
     * @var string
     */
    protected $primaryKey = 'cid';


    //关联detail模型
    public function details()
    {
        return $this->belongsTo(\App\Model\Admin\Details::class, 'did');
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
