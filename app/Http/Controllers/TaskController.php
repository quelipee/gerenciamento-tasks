<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckDate;
use App\Http\Requests\taskRequestStore;
use App\Http\Requests\taskRequestUpdate;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    protected $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function storeTask()
    {
        return view('auth/taskcreate');
    }

    public function showTaskUpdate(Task $task)
    {
        return view('auth/editTask',compact('task'));
    }

    public function createTask(taskRequestStore $taskRequestStore)
    {
        $this->taskService->task($taskRequestStore);
        return redirect(route('index'),Response::HTTP_CREATED);
    }

    public function editTask(taskRequestUpdate $taskRequestUpdate, int $task)
    {
        $this->taskService->editTask($taskRequestUpdate, $task);
        return redirect(route('index'),Response::HTTP_CREATED);
    }

    public function endTask(int $task)//esta funcao conclui uma tarefa como concluida
    {
        $this->taskService->endTask($task);
        return redirect(route('index'),Response::HTTP_CREATED);
    }

    public function deleteTask(int $task)
    {
        $this->taskService->destroy($task);
        return redirect(route('index'), Response::HTTP_FOUND);
    }
}
