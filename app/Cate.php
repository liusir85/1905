<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $primaryKey='cate_id';

    protected  $table='cate';

    public $timestamps = false;

    //白名单   表设计中不允许为空白的
//    protected $fillable=['brand_name','brand_url','brand_desc '];

    //黑名单   表设计中允许为空白的
//    protected $guarded=['brand_logo','brand_desc'];
    protected $guarded=[''];
}
