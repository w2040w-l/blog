<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qrecord extends Model
{
    //
    const UPDATED_AT = null;
    public function question(){
        return $this->belongsTo('App\Model\Question');
    }
    public function previous(){
        return $this->hasOne('App\Model\Qrecord', 'previous_qrecord');
    }
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
}
