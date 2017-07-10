<?php

namespace App\http\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //关联数据表
    protected $table = 'goods';
    public $timestamps = false;
}
