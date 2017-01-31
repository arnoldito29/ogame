<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Lang;
use Event;
use App\Events\UserLogin;

class Admin
{
    
    protected $redirectTo = 'home';
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = '/' . Lang::getLocale() . '/'. $this->redirectTo;
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
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            Event::fire(new UserLogin( ['data'] ));
            
            return $next($request);
        }

        return redirect( $this->redirectTo );
    }
}
