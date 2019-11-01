<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    protected $table = 'users_details';
    protected $fillable = ['name','relation','gender','dob','marriage_status','matrimonial','email','mobile','father_name','mother_name','address','city','state','occupation','department','post_graduate_degree','post_graduate_university','post_graduate_university_city','post_graduate_state','post_graduate_university_percentage','post_graduate_year_of_passing','graduate_degree','graduate_university','graduate_university_city','graduate_state','graduate_university_percentage','graduate_year_of_passing','class_12_board','class_12_school_name','class_12_percentage','class_12_year_of_passing','class_12_city','class_10_board','class_10_school_name','class_10_percentage','class_10_year_of_passing','class_10_city'];

}
