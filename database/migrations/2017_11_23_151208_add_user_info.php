<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::table('users', function (Blueprint $table){
			$table->string('url')->default('default.jpg');
			$table->string('sign')->nullable();
			$table->string('key_word')->nullable();
			$table->string('github')->nullable();
			$table->string('website')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::table('users', function (Blueprint $table){
			$table->dropColumn('url');
			$table->dropColumn('sign');
			$table->dropColumn('key_word');
			$table->dropColumn('github');
			$table->dropColumn('website');
		});
    }
}
