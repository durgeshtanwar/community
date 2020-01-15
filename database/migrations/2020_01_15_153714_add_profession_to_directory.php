<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfessionToDirectory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('directory', function (Blueprint $table) {
            //
            $table->string('profession')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('directory', function (Blueprint $table) {
            //
            $table->dropColumn('profession');
        });
    }
}
