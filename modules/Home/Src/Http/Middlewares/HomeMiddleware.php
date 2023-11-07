<?php
namespace Modules\Home\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class HomeMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
