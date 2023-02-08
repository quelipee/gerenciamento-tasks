<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class finishedTask
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
        $id = $request->segment(2);
        $task = Task::find($id);

        if (Auth::id() == $task->user_id)
        {
            if ($task->status == 'Finalizado' or $request->status == 'Finalizado')
            {
                return redirect()->route('index')->withErrors(['errors' => 'Não pode editar uma tarefa finalizada!!!']);
            }
        }
        return $next($request);
    }
}
