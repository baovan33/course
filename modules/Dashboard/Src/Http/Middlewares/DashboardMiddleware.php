<?php
namespace Modules\Dashboard\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class DashboardMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
