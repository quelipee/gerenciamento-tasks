<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class UserTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_User_CAN_REGISTER()
    {
        //prepare
        $payload = [
            'name' => 'felipe',
            'email' => 'fe@gmail.com',
            'password' => '123'
        ];
        //act
        $response = $this->post('/register',$payload);
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('users',['email' => $payload['email']]);
    }

    public function test_USER_CAN_LOGAR()
    {
        User::factory()->create(['email' => 'fe@gmail.com','password' => '123']);
        //prepare
        $payload = [
            'email' => 'fe@gmail.com',
            'password' => '123'
        ];
        //act
        $response = $this->post('login',$payload);
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_USER_CAN_LOGOUT()
    {
        //prepare
        $model = User::factory()->create();
        Session::start();
        //act
        $response = $this->actingAs($model)->get('/logout');
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_USER_CAN_CREATE_TASKS()
    {
        //prepare
        $model = User::factory()->create();
        Session::start();
//        dd($payload);
        $payload = [
            'title' => 'nao tem',
            'description' => 'acho q nao existe essa descricao',
            'date_end' => Carbon::parse('25-02-2023'),
            'status' => 'ativo',
            'user_id' => $model->id,
        ];
        //act
        $response = $this->actingAs($model)->post('index/create-task',$payload);
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function test_USER_CAN_UPDATE_TASK()
    {
        //prepare
        Session::start();
        $model = Task::factory()->create();
        $task = User::find($model->user_id);
        $payload = [
            'title' => 'nao tem titulo',
            'description' => 'nao tem descricao',
            'date_end' => Carbon::now(),
            'status' => 'finalizado',
            'user_id' => $model->user_id
        ];
        //act
        $response = $this->actingAs($task)->put('index/' . $model->id, $payload);
        //assert
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('tasks',['title' => $payload['title']]);
    }

    public function test_USER_CAN_DELETE_TASK()
    {
        //prepare
        Session::start();
        $model = Task::factory()->create();
        $task = User::find($model->user_id);
        //act
        $response = $this->actingAs($task)->delete('index/' . $model->id);
        //assert
        $response->assertStatus(Response::HTTP_FOUND);
        $this->assertDatabaseMissing('tasks',['title' => $model['title']]);
    }
}
