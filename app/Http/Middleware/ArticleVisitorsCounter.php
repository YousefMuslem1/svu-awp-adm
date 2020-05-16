<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;

class ArticleVisitorsCounter
{
    /**
     * Handle an incoming request.

     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
