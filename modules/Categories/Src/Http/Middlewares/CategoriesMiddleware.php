<?php
namespace Modules\Categories\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class CategoriesMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
