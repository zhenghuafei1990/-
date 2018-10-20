<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'message';

    //主键
    protected $primaryKey = 'mid';

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

    public function messagecargood()
    {
        return $this->hasMany('APP\Model\Home\Usershome','mid');
    }

}












