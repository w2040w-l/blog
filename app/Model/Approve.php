<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Approve extends Model
{
    //
    const UPDATED_AT = null;
    public function answer(){
        return $this->belongsTo('App\Model\Answer');
    }
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
}
