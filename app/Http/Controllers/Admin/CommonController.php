<?php
//Common控制器
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
   protected $data = array();

   public function __construct()
   {
       //parent::__construct();
       
       //在此查询页头和页脚，以及其他信息，并将结果合并到data数组属性。
       //$this->data['links'] = \DB:table("links")->get();
   }
}
