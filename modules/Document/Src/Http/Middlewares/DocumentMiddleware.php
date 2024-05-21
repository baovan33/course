<?php
namespace Modules\Document\Src\Http\Middlewares;

use Illuminate\Http\Request;
use Closure;
class DocumentMiddleware {
    public  function  handle(Request $request, Closure $next) {
        echo 'middleware' . '<br>';

        return $next($request);
    }
}
