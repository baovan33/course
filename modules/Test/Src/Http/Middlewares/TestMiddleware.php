<?php
namespace Modules\Test\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class TestMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
