<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5af70e7301a3dRelationshipsToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function(Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '157326_5af70d9044431')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('bookings', function(Blueprint $table) {
            if(Schema::hasColumn('bookings', 'customer_id')) {
                $table->dropForeign('157326_5af70d9044431');
                $table->dropIndex('157326_5af70d9044431');
                $table->dropColumn('customer_id');
            }
            
        });
    }
}
