<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //加载后台首页
    public function index()
    {
    	return view("admin.index");
    }
    public function error()
    {
        return view("home.404");
    }
}
