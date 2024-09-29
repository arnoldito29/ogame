<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
			$table->string('name');
            $table->unsignedInteger('server_id');
            $table->foreign('server_id')->references('id')->on('servers');
			$table->integer('size');
			$table->integer('metal');
			$table->integer('crystal');
			$table->integer('deuterium');
			$table->integer('reactor');
			$table->integer('energy');
			$table->integer('temp');
			$table->integer('plasma');
			$table->integer('crawler_percent');
			$table->integer('items');
			$table->integer('magma');
			$table->integer('refinery');
			$table->integer('syn');
			$table->integer('class');
			$table->integer('ally');
			$table->float('bonus',7,3);
			$table->integer('acoustic');
			$table->integer('powered');
			$table->integer('depth');
			$table->integer('pump');
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
        Schema::dropIfExists('resources');
    }
};
