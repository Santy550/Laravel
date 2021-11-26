<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AsegurarIdNumerico
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');

        if (!is_numeric($id)){
            return redirect()->route('error');
        }

        return $next($request);
    }
}
