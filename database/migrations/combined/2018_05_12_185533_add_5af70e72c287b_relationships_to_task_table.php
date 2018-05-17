<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5af70e72c287bRelationshipsToTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function(Blueprint $table) {
            if (!Schema::hasColumn('tasks', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '157334_5af70e3946fd7')->references('id')->on('task_statuses')->onDelete('cascade');
                }
                if (!Schema::hasColumn('tasks', 'user_id')) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '157334_5af70e39537af')->references('id')->on('users')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function(Blueprint $table) {
            if(Schema::hasColumn('tasks', 'status_id')) {
                $table->dropForeign('157334_5af70e3946fd7');
                $table->dropIndex('157334_5af70e3946fd7');
                $table->dropColumn('status_id');
            }
            if(Schema::hasColumn('tasks', 'user_id')) {
                $table->dropForeign('157334_5af70e39537af');
                $table->dropIndex('157334_5af70e39537af');
                $table->dropColumn('user_id');
            }
            
        });
    }
}
