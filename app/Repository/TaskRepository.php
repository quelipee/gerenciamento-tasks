<?php

namespace App\Repository;

use App\Models\Task;
use App\Models\User;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Json;

class TaskRepository
{
    public function allTaskUser(Request $request)
    {
        $user = User::query()->find(Auth::user()->id);
        $tasks = $user->task()->where('title', 'like', '%'.$request->search.'%')->paginate(7);
        return response()->json($tasks,Response::HTTP_CREATED);
    }

    public function findTaskUser(int $task)
    {
        $user = Auth::user();
        $user = $user->task()->find($task);
        if (!$user) return response()->json(['Error: ' => Response::HTTP_NOT_FOUND]);
        return $user;
    }
}
