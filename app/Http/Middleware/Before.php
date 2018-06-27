<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Controllerの前処理を定義する
 * @author Administrator
 */
class Before
{
    /**
     * Create a new instance.
     *
     * @param  \Illuminate\Contracts\View\Factory  $view
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) 
    {
        //
        return $next($request);
    }
}
