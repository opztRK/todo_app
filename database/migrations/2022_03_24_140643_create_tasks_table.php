<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->ingeger('folder_id')->unsigned();
            $table->string('title',100);
            $table->integer('status')->default(1);
            $table->date('due_date');
            $table->timestamp('created_at');

            //外部キーの設定 references→参照はid    on→テーブルはfolders 
            $table->foreign('folder_id')->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
