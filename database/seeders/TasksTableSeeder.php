<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //rangeで１～３の整数を指定
        foreach (range(1, 3) as $num) {
            DB::table('tasks')->insert([
                'folder_id' => 1,
                'title' => "サンプルタスク 番号　は{$num}",
                'status' => $num,
                'due_date' => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}