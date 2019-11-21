<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $primaryKey='login_id';

    protected  $table='login';

    public $timestamps = false;

    //白名单   表设计中不允许为空白的
    protected $fillable=['login_pwd','login_code ','login_email'];

    //黑名单   表设计中允许为空白的
    protected $guarded=['login_pwd1'];
//    protected $guarded=[''];
}
