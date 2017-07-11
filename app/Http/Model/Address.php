<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //与模型关联的adminuser表
    protected $table = 'address';
    public $timestamps = false;

}
