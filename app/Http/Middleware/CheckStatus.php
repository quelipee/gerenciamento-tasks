<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\TaskService;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStatus
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
        $user = User::with('task')->find(Auth::user()->id);
        $use1 = $user->task;
        foreach ($use1 as $use)
        {
            if ($use['date_end'] <= Carbon::now()->toDateString() and $use['status'] == 'Em andamento')
            {
                $use['status'] = "Finalizado";
                $use->save();
            }
        }
        return $next($request);
    }
}
