<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    const UPDATED_AT = null;
    protected $hidden = ['password','remember_token'];
    public function records(){
        return $this->hasMany('App\Model\Qrecord');
    }
    public function questions(){
        return $this->hasMany('App\Model\Question');
    }
    public function answers(){
        return $this->hasMany('App\Model\Answer');
    }
    public function watchAnswers(){
        return $this->hasManyThrough('App\Model\Answer', 'App\Model\Follow', 'follower_id', 'user_id'
        ,'id', 'followed_id');
    }
    public function approves(){
        return $this->hasMany('App\Model\Approve');
    }
    public function watches(){
        return $this->hasMany('App\Model\Watch');
    }
    public function followed(){
        return $this->hasMany('App\Model\Follow', "followed_id");
    }
    public function follower(){
        return $this->hasMany('App\Model\Follow', "follower_id");
    }

    public function hasFollowed($uid){
        return $this->followed()->where("follower_id", $uid)->exists();
    }
    public function haveapp($aid){
        $apps = $this->approves();
        if($apps == null) return false;
        else if($apps->where(['answer_id'=>$aid])->first() == null) return false;
        else return true;
    }
}
