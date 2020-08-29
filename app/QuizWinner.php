<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizWinner extends Model
{
    protected $table="quiz_winners";

    protected $fillable=['user_id','quiz_id','is_winner','answer','question','username'];

    protected $hidden=['user_id','quiz_id','is_winner','answer','question','username'];

    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function goldHistory(){
        return $this->belongsTo('App\GoldHistory');
    }
}
