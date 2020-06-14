<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table = 'apply_jobs';
    protected $fillable = ['name','apply_for','contact_number','city','status','state'];
}
