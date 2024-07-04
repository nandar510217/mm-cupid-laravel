<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd($request->path());
        // dd($request->method);
        // dd(Session::get('permission'));
        if (Auth::guard('admin')->user() != null) {
            $request_path = $request->path();
            $explode_route = explode('/', $request_path);
            $route_group = $explode_route[0] . '/' . $explode_route[1];
            // dd($route_group);
            $is_auth = false;
             
            foreach (Session::get('permission') as $permission) {
                if ($permission->name == $route_group ) {
                    $is_auth = true;
                }
            }
            if ($is_auth) {
                return $next($request);
            } else {
                // return redirect('admin-backend/unauthorize');
                abort(403);
            }
        } else {
            return redirect('admin-backend/login');
        }

    }
}
