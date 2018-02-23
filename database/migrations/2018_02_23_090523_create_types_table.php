<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');		//分类唯一id
			$table->integer('p_id')->nullable();	//父级id(第一级为null)
			$table->string('l1_name')->nullable();	//父级名称
			$table->string('l2_name');
			$table->string('ding_hook')->nullable();	//钉钉Hook
			$table->string('desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
