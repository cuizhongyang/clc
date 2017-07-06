<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //关联表
    protected $table = 'orders';
    //取消时间填充
   	public $timestamps = false;
}
