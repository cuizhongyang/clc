<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //与模型关联的adminuser表
    protected $table= 'admin_users';
    protected $primaryKey= 'id';
    public $timestamps = false;
	public function role()
    {
        return $this->belongsToMany('App\Http\Model\Role');
    }
	public function auth()
    {
        return $this->belongsToMany('App\Http\Model\Auth');
    }
}
