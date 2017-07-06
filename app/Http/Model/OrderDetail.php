<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    //与模型关联的adminuser表
    protected $adminuser = 'order_details';
    
    public $timestamps = false;
}
