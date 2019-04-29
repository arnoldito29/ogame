<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('planets')) {
            Schema::create('planets', function (Blueprint $table) {
                $table->increments('id');
                $table->date('data')->nullable();
                $table->string('name')->nullable();
                $table->enum('type', ['p', 'm'])->default('p');
                $table->unsignedInteger('player_id')->default('0');
                $table->unsignedInteger('galaxy')->default('0');
                $table->unsignedInteger('sector')->default('0');
                $table->unsignedInteger('place')->default('0');
                $table->timestamps();
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
        Schema::dropIfExists('planets');
    }
}
