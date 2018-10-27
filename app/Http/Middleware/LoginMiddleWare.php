<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class LoginMiddleware
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
        // if (! \Session::has('id'))
        if (empty(\Session::get('uid')))
        {
            return redirect('login');
        }
        else
        {
            $user = DB::table('users')
                ->where('id', \Session::get('uid'))
                ->where('deleted', 0)
                ->first();

            if (!$user)
            {
                \Session::flush();
                $request->session()->flash('flash_message', 'Your account has been suspended. Contact '.env('SITE_EMAIL'));
                return redirect('login');
            }
        }
        return $next($request);
    }
}
