<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Requests\CreateTask;
use Carbon\Carbon;

class TaskTest extends TestCase
{
    //テストケースごとにDBをリフレッシュしてマイグレーションを再実行するらしい
    use RefreshDatabase;


    // /**
    //  * A basic feature test example.
    //  * 元々ある　↑ベターなテスト例
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /**
     * 各テストメソッドの実行前に呼ばれる
     */
    public function setUp():void
    {
        // setupメソッドの際はペアレントが必須
        parent::setUp();

        //テストケース実行前にフォルダデータを用意する
        $this->seed('FoldersTableSeeder');
    }



    /**
     * 期限日が日付ではない場合はバリデーションエラー
     * テストメソッドでは必ず＠TESTを記述する↓
     * @test
     */

     public function due_date_should_be_date()
     {
         $response = $this->post('/folders/1/tasks/create',[
             'title' => 'Sample task',
             'due_date' => 123, //不正なデータ（日付でなく数値）
         ]);


        $response->assertSessionHasErrors([
            'due_date' => '期限日　には日付をよろしく！',
        ]);
    }

    
    /**
     * 期限日が過去日付の場合はバリデーションエラー
     * テストメソッドでは必ず＠TESTを記述する↓
     * @test
     */
    public function due_date_should_not_be_past()
    {
        $response = $this->post('/folders/1/tasks/create',[
            'title' => 'Sample task',
            // 'due_date' => Carbon::yesterday()->format('Y/m/d'), // 不正なデータ（昨日の日付）
            'due_date' => Carbon::now(), 
        ]);

        $response->assertSessionHasErrors([
            'due_date' => '期限日は今日以降でよろしくね～',
        ]);
    }



}
