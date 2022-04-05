<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
use App\Models\Folder;

class FoldersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //リレーション用に追加
    $user = DB::table('users')->first();

    $titles = ['重要＆至急', '至急', '重要', 'その他'];

    foreach ($titles as $title) {
      DB::table('folders')->insert([
        'title' => $title,
        'user_id' => $user->id,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
      ]);
    }
    //
  }
}