<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('contents') ) {
            
            Schema::create('contents', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('sort')->nullable();
                $table->string('name_lt');
                $table->string('slug_lt');
                $table->text('text_lt');
                $table->string('name_lv');
                $table->string('slug_lv');
                $table->text('text_lv');
                $table->string('name_ee');
                $table->string('slug_ee');
                $table->text('text_ee');
                $table->string('name_en');
                $table->string('slug_en');
                $table->text('text_en');
                $table->string('name_ru');
                $table->string('slug_ru');
                $table->text('text_ru');
                $table->string('name_pl');
                $table->string('slug_pl');
                $table->text('text_pl');
                $table->dateTime('create');
                $table->string('type')->nullable();
                $table->string('module')->nullable();
                $table->tinyInteger('deleted')->nullable();
                $table->tinyInteger('active')->nullable();
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
        //Schema::drop('contents');
    }
}
