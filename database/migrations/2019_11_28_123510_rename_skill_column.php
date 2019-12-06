<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSkillColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('apply_jobs', function(Blueprint $table) { 
            $table->renameColumn('skill', 'apply_for');

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
        Schema::table('apply_jobs', function(Blueprint $table) { 
            $table->renameColumn('apply_for', 'skill');

        });
    }
}
