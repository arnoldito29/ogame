<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMatchTableAddCoff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('match', 'coff1')) {
            Schema::table('match', function (Blueprint $table) {
                $table->float('coff3', 5, 2)->default(1)->nullable()->after('detail');
                $table->float('coff2', 5, 2)->default(1)->nullable()->after('detail');
                $table->float('coff1', 5, 2)->default(1)->nullable()->after('detail');
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
        Schema::table('match', function (Blueprint $table) {
            $table->dropColumn('coff1');
            $table->dropColumn('coff2');
            $table->dropColumn('coff3');
        });
    }
}
