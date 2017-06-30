<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //与模型关联的adminuser表
    protected $adminuser = 'users';
    public $timestamps = false;

}
