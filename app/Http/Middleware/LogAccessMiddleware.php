<?php

namespace App\Http\Middleware;

use Closure;
use \App\Models\LogAccess;

class LogAccessMiddleware
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
        // next go to front
        //return $next($request);
        // dd($request);
        // dd(redirect());
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();
        LogAccess::create(['log' => "IP $ip request the $route"]);

        // return $next($request);
        $resposta = $next($request);
        $resposta->setStatusCode('201', 'The status and the text of response was modified');
        // dd($resposta);
        return $resposta;
        // return Response('Chegámos no middleware e finalizamos no middleware');
    }
}
