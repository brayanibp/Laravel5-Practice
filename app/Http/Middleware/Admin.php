<?php

namespace Cinema\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Support\Facades\Redirect;

class Admin
{

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->user()->id != 1) {
			Session::flash('message-error', 'No tiene esos privilegios.');
			return Redirect::to('admin');
		}
		return $next($request);
	}
}
