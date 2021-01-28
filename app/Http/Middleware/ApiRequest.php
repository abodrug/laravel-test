<?php

namespace App\Http\Middleware;

use Auth;
use Carbon\Carbon;
use Closure;
use Event;
use Illuminate\Http\Request;

class ApiRequest
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
        Event::dispatch('api.hit', [Auth::user(), Carbon::now()]);

        return $next($request);
    }
}
