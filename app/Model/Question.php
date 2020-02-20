<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    const UPDATED_AT = null;
    public function records(){
        return $this->hasMany('App\Model\Qrecord');
    }
    public function user(){
        return $this->hasOne('App\Model\User');
    }
    public function answers(){
        return $this->hasMany('App\Model\Answer');
    }
    public function nowrecord(){
        return $this->hasOne('App\Model\Qrecord', 'id', "qrecord_id");
    }
    public function watches(){
        return $this->hasMany('App\Model\Watch');
    }
    public function question_tags(){
        return $this->hasMany('App\Model\Question_tag');
    }
    public function haswatch($uid){
        if($this->watches()->where(['user_id' => $uid])->count() == 0){
            return false;
        } else {
            return true;
        }
    }
}
