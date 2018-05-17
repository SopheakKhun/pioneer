<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1526138424UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
if (!Schema::hasColumn('users', 'suburb')) {
                $table->string('suburb');
                }
if (!Schema::hasColumn('users', 'state')) {
                $table->string('state');
                }
if (!Schema::hasColumn('users', 'postcode')) {
                $table->integer('postcode')->nullable();
                }
if (!Schema::hasColumn('users', 'phone')) {
                $table->integer('phone')->nullable();
                }
if (!Schema::hasColumn('users', 'mobile')) {
                $table->integer('mobile')->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('suburb');
            $table->dropColumn('state');
            $table->dropColumn('postcode');
            $table->dropColumn('phone');
            $table->dropColumn('mobile');
            
        });

    }
}
