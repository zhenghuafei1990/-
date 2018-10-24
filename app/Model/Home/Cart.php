<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $guarded = [];
     
}