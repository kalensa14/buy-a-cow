<?php

namespace App\Http\Middleware;

use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || $request->user()->role !== Role::ADMIN) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
