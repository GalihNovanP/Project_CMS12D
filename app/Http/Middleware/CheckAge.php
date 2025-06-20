<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->age <= 17) {
            return response( 'Maaf, Umur anda belum mencukupi untuk melakukan pendaftaran KTP.', 403);
        }

        return $next($request);
    }
}
