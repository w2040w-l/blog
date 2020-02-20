<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    public function question(){
        return $this->belongsTo('App\Model\Question');
    }
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
    public function approves(){
        return $this->hasMany('App\Model\Approve');
    }
    public function comments(){
        return $this->hasMany('App\Model\Commentmy');
    }
}
