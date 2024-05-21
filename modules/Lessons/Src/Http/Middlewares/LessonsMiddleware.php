<?php
namespace Modules\Lessons\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class LessonsMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
