<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question_tag extends Model
{
    //
    const UPDATED_AT = null;
    public function question(){
        return $this->belongsTo('App\Model\Question');
    }
    public function tag(){
        return $this->belongsTo('App\Model\Tag');
    }
}
