<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('full_name');
            $table->string('size');
            $table->text('link');
            $table->unsignedInteger('ad_id')->default('0');
            $table->decimal('price',9, 2)->default('0.0');
            $table->unsignedInteger('object_id');
            $table->foreign('object_id')->references('id')->on('object_links');
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
        Schema::dropIfExists('flats');
    }
}
