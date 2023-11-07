<?php
namespace Modules\Courses\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class CoursesMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
