<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model{  
    //指定表名  
protected $table= 'auth';  
//指定主键  
protected $primaryKey= 'id';  
public $timestamps = false;
} 