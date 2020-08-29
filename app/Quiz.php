<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable=[
        'question','date','answer','option1','option2','option3','option4'
    ];

    public function admin(){
        return $this->belongsTo('App\User','role:1');
    }

    public function winner(){
        return $this->hasMany('App\QuizWinner');
    }

}
