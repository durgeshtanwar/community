<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    //
    protected $table = 'directory';
    protected $fillable = ['name','address','profession','contact_number','city','state'];
}
