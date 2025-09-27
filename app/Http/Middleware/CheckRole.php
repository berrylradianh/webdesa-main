<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->session()->has('user_id')) {
            return redirect('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        if ($request->session()->get('role') !== $role) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
