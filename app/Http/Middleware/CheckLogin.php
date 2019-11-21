<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        session(['user'=>'你猜']);
//        $user=session('user');
//        echo "1111";
//        dd($user);
//        if(!$user){
//        dd($request->session()->has('user'));
        session(['user'=>'123']);
        if(!$request->session()->has('user')){
            return redirect('login');
        }

        return $next($request);
    }
}
