<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        $roles = explode('-', $role)??[];
        // dd($role);
        // dd($request->user()->role);
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }else if($request->user()->role == 'admin'){
            return redirect()
            ->to(route('admin.dashboard'));
        }else if($request->user()->role == 'staff'){
            return redirect()
            ->to(route('admin.dashboard'));
        }else if($request->user()->role == 'member'){
            return redirect()
            ->to(route('member.dashboard'));
        }

        return redirect()
            ->to(route('login'));
    }
}
