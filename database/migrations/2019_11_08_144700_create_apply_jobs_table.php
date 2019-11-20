<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('skill');
            $table->string('contact number');
            $table->string('city');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('user_id');
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apply_jobs');
    }
}
