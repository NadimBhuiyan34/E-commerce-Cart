<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart; 
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCartNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userCartItemCount = Cart::where('user_id', Auth::id())->count();

        if ($userCartItemCount>0) {

            return $next($request);
        }
        return redirect()->back()->with('message', 'Please add cart first');
       
    }
}
