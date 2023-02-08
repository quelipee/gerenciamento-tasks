<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckDate;
use App\Http\Middleware\finishedTask;
use App\Http\Requests\taskRequestStore;
use App\Http\Requests\taskRequestUpdate;
use App\Jobs\DeleteFinishedTasks;
use App\Models\Task;
use App\Models\User;
use App\Repository\TaskRepository;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    protected TaskService $taskService;
    protected TaskRepository $taskRepository;
    public function __construct(TaskService $taskService, TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->taskService = $taskService;
    }

    public function index(Request $request)//index onde mostra todas as suas tarefas ja feitas
    {
        dispatch(new DeleteFinishedTasks());
        $tasks = $this->taskRepository->allTaskUser($request);
        return view('auth/index', ['tasks' => $tasks->original]);
    }

    public function storeTask()//redireciona para a sua view de criacao de tarefas
    {
        return view('auth/taskcreate');
    }

    public function taskView(Task $task)//olha uma tarefa sua detalhada
    {
        return view('auth/taskView', ['task' => $task]);
    }

    public function showTaskUpdate(Task $task)//ele redireciona para a view com os detalhes da sua tarefa pronto para editar
    {
        return view('auth/editTask',compact('task'));
    }

    public function createTask(taskRequestStore $taskRequestStore)//cria uma nova tarefa
    {
        $this->taskService->task($taskRequestStore);
        return redirect(route('index'),Response::HTTP_CREATED);
    }

    public function editTask(taskRequestUpdate $taskRequestUpdate, int $task)//edita a sua tarefa
    {
        $this->taskService->editTask($taskRequestUpdate, $task);
        return redirect(route('index'),Response::HTTP_CREATED);
    }

    public function endTask(int $task)//esta funcao conclui uma tarefa como concluida
    {
        $this->taskService->endTask($task);
        return redirect(route('index'),Response::HTTP_CREATED);
    }

    public function deleteTask(int $task)//deleta sua tarefa
    {
        $this->taskService->destroy($task);
        return redirect(route('index'), Response::HTTP_FOUND);
    }

    public function taskUserView(User $user, int $task)// olha uma tarefa detalhada de outra pessoa
    {
        $task = $this->taskRepository->findTaskUserGuest($task);
        return view('auth/taskViewDetailUser',['user' => $user, 'task' => $task->original]);
    }

    public function allTasksUsers()//ve todas as pessoas que sao cadastrada no site e quantas tarefas ela tem
    {
        $tasks = $this->taskRepository->getAllTasks();
        return view('auth/allTasksUsers', ['tasks' => $tasks->original]);
    }

    public function taskUser(User $user)//ve detalhadamente as tarefas do usuario que vc desejar
    {
        $tasks = $this->taskRepository->getAllTasksUser($user);
        return view('auth/taskUser',['tasks' => $tasks->original]);
    }
}
