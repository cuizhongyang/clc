<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
   
    //与模型关联的link表
    protected $table = 'link';
    
    public $timestamps = false;
}
