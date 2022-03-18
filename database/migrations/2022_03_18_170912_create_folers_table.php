<?php
use Carbon\Carbon;
use Illuminate\support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFolersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',20);
            $table->timestamps();
        });

        $titles = ['重要＆至急','至急','重要','その他'];

        foreach($titles as $title){
            DB::table('folders')->insert([
                'title' => $title,
                'created_at'=> Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
    //

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('folders');
    }
}
