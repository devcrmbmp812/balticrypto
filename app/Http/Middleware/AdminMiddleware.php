<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use App\User;

class AdminMiddleware
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
        if(Sentinel::check()) {
            if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '1'){
                return redirect('admin/dashboard');
            }else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '2' || Sentinel::getUser()->roles()->first()->slug == '3')
                return redirect('user/dashboard');
            else if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == '4')
                return redirect('support/dashboard');
            else
                return redirect('/login');
        }
        else{
            return redirect('admin/dashboard');
        }
    }
}
