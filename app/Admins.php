<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    public $primaryKey='admins_id';

    protected  $table='admins';

    public $timestamps = false;

    //白名单   表设计中不允许为空白的
//    protected $fillable=['brand_name','brand_url','brand_desc '];

    //黑名单   表设计中允许为空白的
//    protected $guarded=['brand_logo','brand_desc'];
    protected $guarded=[''];
}
