<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserHasStore
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user =Auth::user();
        if(!$user->store_id)
           {
            return redirect()->route('user.store.create')
            ->with('error','يرجى اضافة متجر');
           } 
        return $next($request);
    }
}
