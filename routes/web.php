<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckDate;
use App\Http\Middleware\CheckStatus;
use App\Http\Middleware\finishedTask;
use App\Http\Middleware\NotCanDeleteTaskGuest;
use App\Http\Middleware\NotCanEditTaskGuest;
use App\Http\Middleware\VerifyEmail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->middleware(['guest']);

Route::middleware(['auth'])->group(function ()
{
    Route::get('index',[TaskController::class,'index'])->name('index')
        ->middleware(CheckStatus::class);

    Route::get('view/{task:id}',[TaskController::class,'taskView'])->name('task.view');

    Route::get('see-all-tasks',[TaskController::class,'allTasksUsers'])->name('all.tasks.users');
    Route::get('task-user/{user:name}',[TaskController::class,'taskUser'])->name('see.task.user');
    Route::get('task-user/{user:name}/{task:id}',[TaskController::class,'taskUserView'])->name('see.task.id.user');

    Route::get('index/create-task',[TaskController::class,'storeTask'])->name('store.task');
    Route::post('index/create-task',[TaskController::class,'createTask'])->name('create.task')
        ->middleware(CheckDate::class);

    Route::middleware([finishedTask::class,NotCanEditTaskGuest::class])->group(function ()
    {
        Route::get('index/{task:id}/edit-task',[TaskController::class,'showTaskUpdate'])->name('show.task.update');
        Route::put('index/{task:id}/',[TaskController::class,'editTask'])->name('edit.task')
            ->middleware(CheckDate::class);
    });


    Route::put('index/{task:id}/end-task',[TaskController::class,'endTask'])->name('end.task');

    Route::delete('index/{task:id}',[TaskController::class,'deleteTask'])->name('delete.task')
        ->middleware(NotCanDeleteTaskGuest::class);
    Route::get('logout',[UserController::class,'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function ()
{
    Route::get('login',[UserController::class,'indexLogin'])->name('login.user');

    Route::post('login',[UserController::class,'login'])->name('login');
    Route::post('register',[UserController::class,'register'])->name('register')
    ->middleware(VerifyEmail::class);
});

