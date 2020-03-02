<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Passport\HasApiTokens;

class UserDetail extends Model
{
    //
    protected $table = 'users_details';
    protected $fillable = ['name','relation','gender','dob','marriage_status','matrimonial','email','mobile','father_name','mother_name','address','city','state','occupation','department',];
}
