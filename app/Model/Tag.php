<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    const UPDATED_AT = null;
    public function records(){
        return $this->hasMany('App\Model\Trecord');
    }
    public function answers(){
        return $this->hasManyThrough('App\Model\Answer', 'App\Model\Question_tag', "tag_id",
        "question_id", "id", "question_id");
    }
    public function nowrecord(){
        return $this->hasOne('App\Model\Trecord', 'id', "trecord_id");
    }
}
