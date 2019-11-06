<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $fillable = ['title','description','city','contact_person','contact_number','user_id'];
}
