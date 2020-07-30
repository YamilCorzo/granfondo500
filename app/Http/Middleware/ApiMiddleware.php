<?php

namespace App\Http\Middleware;

use Closure;

class ApiMiddleware
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
        $response = $next($request);

        if(method_exists($response, 'header')) {
            $response->header('Access-Control-Allow-Methods', 'PUT, GET, POST, DELETE, OPTIONS');
            $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
            $response->header('Access-Control-Allow-Origin', '*');
        } else {
            $response->headers->set('Access-Control-Allow-Origin' , '*');
            $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
            $response->headers->set('Content-Type', 'application/vnd.ms-excel; charset=utf-8');
        }

        return $response;
    }
}
