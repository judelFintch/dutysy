<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\TauxJour;

class InjectExchangeRate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $day_rate = TauxJour::first();
        view()->share('taux', isset($day_rate) ? $day_rate->taux : null);
        return $next($request);
    }
}
