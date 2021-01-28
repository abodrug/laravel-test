<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Middleware\ThrottleRequests;
use RuntimeException;

class ThrottleMyRequests extends ThrottleRequests
{
    protected function resolveRequestSignature($request)
    {
        if ($route = $request->route()) {
            return sha1($route->getDomain().'|'.$request->header('Authorization'));
        }

        throw new RuntimeException('Unable to generate the request signature. Route unavailable.');
    }

}
