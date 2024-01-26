<?php
namespace Modules\Auth\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class AuthMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
