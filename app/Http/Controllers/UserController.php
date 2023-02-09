<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Exception;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
