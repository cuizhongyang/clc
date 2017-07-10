<?php
//将多维数组转化为二维数组
function niubi($data){
    static $result=array();
    foreach($data as $value){
        if(isset($value['children']) && is_array($value['children'])){
            $temp   =   $value;unset($temp['children']);
            $result[$value['id']] =   $temp;
            niubi($value['children']);
        }else{
            $result[$value['id']]=$value;
        }
    }
    return $result;
}


