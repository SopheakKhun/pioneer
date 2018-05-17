<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5af70e72e50c2RelationshipsToRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function(Blueprint $table) {
            if (!Schema::hasColumn('requests', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '157324_5af70b7da56d4')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('requests', function(Blueprint $table) {
            if(Schema::hasColumn('requests', 'customer_id')) {
                $table->dropForeign('157324_5af70b7da56d4');
                $table->dropIndex('157324_5af70b7da56d4');
                $table->dropColumn('customer_id');
            }
            
        });
    }
}
