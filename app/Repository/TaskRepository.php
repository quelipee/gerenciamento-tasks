<?php

namespace App\Repository;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskRepository
{
    public function allTaskUser(Request $request)
    {
        $user = User::query()->find(Auth::user()->id);
        $tasks = $user->task()->where('title', 'like', '%'.$request->search.'%')->paginate(7);
        return response()->json($tasks,Response::HTTP_CREATED);
    }

    public function getAllTasks()
    {
        $users = User::all();
        $tasks = $users->load('task')->where('id','!=',Auth::id())->toQuery()->paginate(7);
        return response()->json($tasks,Response::HTTP_CREATED);
    }

    public function getAllTasksUser(User $user)
    {
        $users = User::find($user->id);
        $task = $users->task()->paginate(7);
        return response()->json($task,Response::HTTP_CREATED);
    }

    public function findTaskUserAuth(int $task)
    {
        $user = Auth::user();
        $user = $user->task()->find($task);
        if (!$user) return response()->json(['Error: ' => Response::HTTP_NOT_FOUND]);
        return $user;
    }

    public function findTaskUserGuest(int $task)
    {
        $task = Task::find($task);
        if (!$task)
        {
            return response()->json($task,Response::HTTP_NOT_FOUND);
        }
        return response()->json($task,Response::HTTP_CREATED);
    }
}
