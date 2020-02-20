<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trecord extends Model
{
    //
    const UPDATED_AT = null;
    public function tag(){
        return $this->belongsTo('App\Model\Tag');
    }
    public function previous(){
        return $this->hasOne('App\Model\Trecord', 'previous_trecord');
    }
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
}
