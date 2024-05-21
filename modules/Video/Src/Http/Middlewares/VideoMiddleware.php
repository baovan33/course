<?php
namespace Modules\Video\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class VideoMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
