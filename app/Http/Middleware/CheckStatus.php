<?php

namespace App\Http\Middleware;

use App\Models\Task;
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
        $task = Task::all();
        foreach ($task as $task_end)
        {
            if ($task_end['date_end'] <= Carbon::now()->toDateString() and  $task_end['status'] == 'Em andamento')
            {
                $task_end['status'] = "Finalizado";
                $task_end->save();
            }
        }
        return $next($request);
    }
}
