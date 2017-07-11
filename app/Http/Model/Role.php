<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{  
    //指定表名  
protected $table= 'role';  
//指定主键  
protected $primaryKey= 'id';  

public function auth()
    {
        return $this->belongsToMany('App\Http\Model\Auth');
    }
public function adminuser()
    {
        return $this->belongsToMany('App\Http\Model\AdminUser');
    }
    
} 