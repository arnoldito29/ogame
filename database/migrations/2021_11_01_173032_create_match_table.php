<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('team_id1')->default('0');
            $table->unsignedInteger('team_id2')->default('0');
            $table->integer('team_result_1')->nullable();
            $table->integer('team_result_2')->nullable();
            $table->boolean('overtime')->nullable();
            $table->string('detail')->nullable();
            $table->integer('team_result_qt1_1')->nullable();
            $table->integer('team_result_qt1_2')->nullable();
            $table->integer('team_result_qt2_1')->nullable();
            $table->integer('team_result_qt2_2')->nullable();
            $table->integer('team_result_qt3_1')->nullable();
            $table->integer('team_result_qt3_2')->nullable();
            $table->integer('team_result_qt4_1')->nullable();
            $table->integer('team_result_qt4_2')->nullable();
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
        Schema::dropIfExists('match');
    }
}
