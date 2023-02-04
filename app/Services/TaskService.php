<?php

namespace App\Services;

use App\Http\Requests\taskRequestStore;
use App\Http\Requests\taskRequestUpdate;
use App\Models\Task;
use App\Repository\TaskRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    private $taskRepository;
    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function task(taskRequestStore $requestStore)
    {
        $data = $requestStore->validated();
        $data['status'] = 'Em andamento';
        $data['user_id'] = auth()->user()->id;
        $task =Task::create($data);
        return response()->json($task,201);
    }

    public function editTask(taskRequestUpdate $taskRequestUpdate, int $task)
    {

        $task = $this->taskRepository->findTaskUser($task);
        $data = $taskRequestUpdate->validated();
        $data['user_id'] = Auth::user()->id;
        $task->fill($data);
        $task->save();

        return response()->json($task,Response::HTTP_CREATED);
    }

    public function destroy(int $task)
    {
        $task = $this->taskRepository->findTaskUser($task);
        $task->delete();
        return response()->json([],Response::HTTP_NO_CONTENT);
    }

    public function endTask(int $task)
    {
        $task = $this->taskRepository->findTaskUser($task);
        $data['status'] = 'Finalizado';
        $task->fill($data);
        $task->save();

        return redirect(route('index'),Response::HTTP_CREATED);
    }
}
