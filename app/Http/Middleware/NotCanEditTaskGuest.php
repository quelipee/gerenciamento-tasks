<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotCanEditTaskGuest
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

        if (Auth::id() != $task->user_id)
        {
            return redirect(route('index'))->withErrors(['errors' => 'Não existe esta tarefa!!!']);
        }
        return $next($request);
    }
}
