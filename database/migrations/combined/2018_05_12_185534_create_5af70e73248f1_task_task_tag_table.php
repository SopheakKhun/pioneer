<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5af70e73248f1TaskTaskTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('task_task_tag')) {
            Schema::create('task_task_tag', function (Blueprint $table) {
                $table->integer('task_id')->unsigned()->nullable();
                $table->foreign('task_id', 'fk_p_157334_157333_taskta_5af70e7324a72')->references('id')->on('tasks')->onDelete('cascade');
                $table->integer('task_tag_id')->unsigned()->nullable();
                $table->foreign('task_tag_id', 'fk_p_157333_157334_task_t_5af70e7324b1e')->references('id')->on('task_tags')->onDelete('cascade');
                
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
        Schema::dropIfExists('task_task_tag');
    }
}
