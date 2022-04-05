<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'test',
            'email' => 'tes@mail.com',
            'password' => bcrypt('test'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        //
    }
}
