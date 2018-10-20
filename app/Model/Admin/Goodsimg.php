<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goodsimg extends Model
{
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goodspicture';
    //主键
    protected $primarykey = 'id';
    //数据填充(不可被批量赋值的属性)
    protected $guarded = [];
    //该模型是否被自动维护时间戳
    public $timestamps = false;
}
