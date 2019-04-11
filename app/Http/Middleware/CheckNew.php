<?php

namespace App\Http\Middleware;

use Closure;

class CheckNew
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
        $checked = 1;
        if (Auth::user()->new == $checked) {
            return $next($request);
        } else {
            return redirect()->route('edit.infor', ['id' => Auth::user()->id]);
        }
    }
}
