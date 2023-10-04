<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Normalizer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->lectures_ids) {
            $array = array_map(function ($id) {
                return (int) trim($id);
            }, explode(',', $request->lectures_ids));
            $request->merge(['lectures_ids' => $array]);
        }

        return $next($request);
    }
}
