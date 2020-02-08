<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFieldsFromUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_details', function (Blueprint $table) {
            //
            $table->dropColumn('post_graduate_degree');
            $table->dropColumn('post_graduate_university');
            $table->dropColumn('post_graduate_university_city');
            $table->dropColumn('post_graduate_university_state');
            $table->dropColumn('post_graduate_university_percentage');
            $table->dropColumn('post_graduate_year_of_passing');
            $table->dropColumn('graduate_degree');
            $table->dropColumn('graduate_university');
            $table->dropColumn('graduate_university_city');
            $table->dropColumn('graduate_university_state');
            $table->dropColumn('graduate_university_percentage');
            $table->dropColumn('graduate_year_of_passing');
            $table->dropColumn('class_12_board');
            $table->dropColumn('class_12_school_name');
            $table->dropColumn('class_12_percentage');
            $table->dropColumn('class_12_year_of_passing');
            $table->dropColumn('class_12_city');
            $table->dropColumn('class_10_board');
            $table->dropColumn('class_10_school_name');
            $table->dropColumn('class_10_percentage');
            $table->dropColumn('class_10_year_of_passing');
            $table->dropColumn('class_10_city');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_details', function (Blueprint $table) {
            //
            $table->string('post_graduate_degree');
            $table->string('post_graduate_university');
            $table->string('post_graduate_university_city');
            $table->string('post_graduate_university_state');
            $table->string('post_graduate_university_percentage');
            $table->string('post_graduate_year_of_passing');
            $table->string('graduate_degree');
            $table->string('graduate_university');
            $table->string('graduate_university_city');
            $table->string('graduate_university_state');
            $table->string('graduate_university_percentage');
            $table->string('graduate_year_of_passing');
            $table->string('class_12_board');
            $table->string('class_12_school_name');
            $table->string('class_12_percentage');
            $table->string('class_12_year_of_passing');
            $table->string('class_12_city');
            $table->string('class_10_board');
            $table->string('class_10_school_name');
            $table->string('class_10_percentage');
            $table->string('class_10_year_of_passing');
            $table->string('class_10_city');
        });
    }
}
