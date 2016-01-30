<?php namespace App\Http\Middleware;

use Closure;

class AuthorMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(!$request->user()->is('author')){
            return redirect('/');
        }

		return $next($request);
	}

}
