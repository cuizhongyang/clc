<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model{  
    //指定表名  
protected $table= 'auth';  
//指定主键  
protected $primaryKey= 'id';  
public $timestamps = false;

public function adminuser()
    {
        return $this->belongsToMany('App\Http\Model\AdminUser');
    }
public function role()
    {
        return $this->belongsToMany('App\Http\Model\Role');
    }
} 