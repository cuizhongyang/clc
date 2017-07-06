<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    
    //与模型关联的adminuser表
    protected $table = 'web_config';
    
    public $timestamps = false;
}
