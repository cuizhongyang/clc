<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected $table= 'active';
    public $timestamps = false;
	
	public function Goods()
    {
        return $this->belongsToMany('App\Http\Model\Goods');
    }

}
