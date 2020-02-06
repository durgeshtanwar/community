<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    //
    protected $table = 'family';
    protected $fillable = ['family_cast','gotra','family_head'];

    public function users(){
        return $this->hasMany('App/User');
    }
}
