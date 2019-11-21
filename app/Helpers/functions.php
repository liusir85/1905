<?php
/**
 * Created by PhpStorm.
 * User: 刘清源
 * Date: 2019/11/6
 * Time: 14:41
 */
//公共函数文件
function getAll(){
//    echo 123;
}
function find($find, $parent_id)
{
    static $info = [];
    foreach ($find as $k => $v) {
        if ($v['parent_id'] == $parent_id) {
            $info[] = $v['cate_id'];
            find($find, $v['cate_id']);
        }
    }
    return $info;
}