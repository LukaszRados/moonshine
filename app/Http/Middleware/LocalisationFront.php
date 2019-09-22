<?php

namespace App\Http\Middleware;

use Closure;
use App\Text;

class LocalisationFront
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // @todo
        // \View::share('translate', Text::asHashMap());
        return $next($request);
    }
}
