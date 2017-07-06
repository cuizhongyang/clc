<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //与模型关联的banner表
    protected $table = 'banner';
    
    public $timestamps = false;
}
