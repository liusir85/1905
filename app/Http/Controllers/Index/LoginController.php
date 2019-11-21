<?php

namespace App\Http\Controllers\Index;
use Illuminate\Support\Facades\Auth; //手动认证用户
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\login;
use Illuminate\Support\Facades\Log;
use Mail;
class LoginController extends Controller
{
    public function reg(){
        return view('index.login.reg');
    }

    public function login(){
        return view('index.login.login');
    }

    //注册
    public function send(){
        $email=request()->email;
//        $email='2199648302@qq.com';

        $code=rand(100000,999999);
//        $message="您的注册码为".$code."打死也不能告诉别人";
        $message="您正在注册全球珠宝宇宙集团会员,验证码是:".$code;

        //发送邮件//        $this->sendemail($email,$code);//第一种文字
        $this->sendemail($email,$message);//第二种插图格式
    }

    //第二种
    public function sendemail($email,$code){
        \Mail::send('index.login.email' , ['code'=>$code] ,function($message)use($email){
            //设置主题
            $message->subject("欢迎注册滕浩有限公司");
            //设置接收方
            $message->to($email);
        });
    }




//第一种
//    public function sendemail($email,$message){
//        \Mail::raw($message ,function($message)use($email){
//            //设置主题
//            $message->subject("欢迎注册滕浩有限公司");
//            //设置接收方
//            $message->to($email);
//        });
//    }


    public function regis(Request $request){
        $sendInfo=session('sendInfo');
        //验证
//        $validatedData = $request->validate([
//            'login_email' => 'required|unique:login|login_email',
//            'login_code'=>'required',
//            'login_pwd' => 'required|regex:/^[a-zA-Z0-9]\w{6,18}$/',
//            'login_pwd1'=>'same:password',
//        ],
//            [
//                'login_email.required'=>'手机号或邮箱不能为空',
//                'login_email.unique'=>'此邮箱已被注册',
//                'login_email.login_email'=>'邮箱格式不正确',
//                'login_pwd.required'=>'密码不能为空',
//                'login_pwd.regex'=>'密码可以是6-18位数字或字母',
//                'login_pwd1.same'=>'确认密码需和密码一致',
//                'login_code.required'=>'验证码不能为空',
//            ]);
//        $data=request()->except('_token');
        $data=$request->all();
        if($data['login_email']!=$sendInfo['login_email']){
            echo "此邮箱与发送验证码邮箱不一致";
            exit;
        }else if($data['login_code']!=$sendInfo['login_code']){
            echo "验证码有误";
            exit;
        }else if((time()-$sendInfo['send_time'])>300){
            echo "验证码已失效";
            exit;
        }
        $data['login_pwd']=md5($data['login_pwd']);
        Login::create($data);
        return redirect('/login');
    }


    //登陆
    public function logindo(){
        $data=request()->except('_token');
        $loginInfo=Login::first();
      //  dd($loginInfo);
        if(empty($loginInfo)){
            echo "账户不存在";exit;
        }else if(md5($data['login_pwd'])==$loginInfo['login_pwd']){
            session(['loginInfo'=>$loginInfo]);
            echo '登陆成功';
        }else{
            echo '登陆失败';exit;
        }
        return redirect('/');
    }
}
