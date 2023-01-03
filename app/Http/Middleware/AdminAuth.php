<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
use App;
class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {     
        $user_type_id = session('user_type_id'); 
        $user_id      = session('user_id'); 
        $screen_lock  = session('screen_lock'); 
        if(empty($user_id)){
             Session::flash('msg', "Your session has expired"); 
             return redirect('/');  
            }else if($screen_lock != '1'){
             return redirect('screenLock');
          }else if($user_type_id == '1'){
             return $next($request);     
        }else{
             Session::flash('msg', "You don't have access this section"); 
             return redirect('/');
        }
         
    }
}
