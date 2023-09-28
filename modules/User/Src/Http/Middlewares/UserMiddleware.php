<?php
namespace Modules\User\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class UserMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
