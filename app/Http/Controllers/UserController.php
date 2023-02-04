<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Jobs\DeleteFinishedTasks;
use App\Models\User;
use App\Repository\TaskRepository;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;
    private $taskRepository;
    public function __construct(UserService $userService, TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        dispatch(new DeleteFinishedTasks());
        $tasks = $this->taskRepository->allTaskUser($request);
        return view('auth/index', ['tasks' => $tasks->original]);
    }
    public function indexLogin()
    {
        return view('login');
    }

    public function register(UserRequest $request)
    {
        $user = $this->userService->createUser($request);
        if ($user)
        {
            $this->userService->autenticate($request);
            return redirect(route('index'),201);
        }
        throw new Exception("error for register!!!");
    }

    public function login(UserRequest $request)
    {
        $this->userService->autenticate($request);
        return redirect(route('index'),201);
    }
    public function logout()
    {
        $this->userService->destroySession();
        return redirect(route('login'),201);
    }

}
