<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $date = $request->input('date_end');
        if ($date < Carbon::now())
        {
            return redirect()->back()->withErrors(['date_end' => 'A data não pode ser menor que a data atual']);
        }elseif ($date > Carbon::parse('2100-01-01')){
            return redirect()->back()->withErrors(['date_end' => 'A data atingiu o limite permitido!!']);
        }
        return $next($request);
    }
}
