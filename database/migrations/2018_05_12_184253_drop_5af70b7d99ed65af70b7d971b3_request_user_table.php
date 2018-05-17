<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Drop5af70b7d99ed65af70b7d971b3RequestUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('request_user');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(! Schema::hasTable('request_user')) {
            Schema::create('request_user', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('request_id')->unsigned()->nullable();
            $table->foreign('request_id', 'fk_p_157324_157320_user_r_5af709ece6756')->references('id')->on('requests');
                $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_p_157320_157324_reques_5af709ece5be8')->references('id')->on('users');
                
                $table->timestamps();
                
            });
        }
    }
}
