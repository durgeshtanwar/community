<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_details', function (Blueprint $table) { 

            $table->bigIncrements('id');  
            $table->string('name');
            $table->string('relation');
            $table->string('gender');
            $table->string('dob');
            $table->string('marriage_status');
            $table->string('matrimonial')->nullable();
            $table->string('email');
            $table->string('father_name');
            $table->string('mother_name');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->string('occupation')->nullable();
            $table->string('department')->nullable();
            $table->string('post_graduate_degree')->nullable();
            $table->string('post_graduate_university')->nullable();
            $table->string('post_graduate_university_city')->nullable();
            $table->string('post_graduate_university_state')->nullable();
            $table->string('post_graduate_university_percentage')->nullable();
            $table->string('post_graduate_year_of_passing')->nullable();
            $table->string('graduate_degree')->nullable();
            $table->string('graduate_university')->nullable();
            $table->string('graduate_university_city')->nullable();
            $table->string('graduate_university_state')->nullable();
            $table->string('graduate_university_percentage')->nullable();
            $table->string('graduate_year_of_passing')->nullable();
            $table->string('class_12_board')->nullable();
            $table->string('class_12_school_name')->nullable();
            $table->string('class_12_percentage')->nullable();
            $table->string('class_12_year_of_passing')->nullable();
            $table->string('class_12_city')->nullable();
            $table->string('class_10_board')->nullable();
            $table->string('class_10_school_name')->nullable();
            $table->string('class_10_percentage')->nullable();
            $table->string('class_10_year_of_passing')->nullable();
            $table->string('class_10_city')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
