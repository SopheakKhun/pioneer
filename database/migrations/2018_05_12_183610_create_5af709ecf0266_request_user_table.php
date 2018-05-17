<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5af709ecf0266RequestUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('request_user')) {
            Schema::create('request_user', function (Blueprint $table) {
                $table->integer('request_id')->unsigned()->nullable();
                $table->foreign('request_id', 'fk_p_157324_157320_user_r_5af709ecf0357')->references('id')->on('requests')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_157320_157324_reques_5af709ecf03e4')->references('id')->on('users')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_user');
    }
}
