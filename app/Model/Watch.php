<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    //
    const UPDATED_AT = null;
    public function question(){
        return $this->belongsTo('App\Model\Question');
    }
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
}
