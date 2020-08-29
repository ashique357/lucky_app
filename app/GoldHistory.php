<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoldHistory extends Model
{
    protected $table="gold_histories";

    protected $fillabel=['user_id','user_name','gold','balance','des','date'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function quiz(){
        return $this->belongsTo('App\Quiz');
    }

    public function qwinner(){
        return $this->hasMany('App\QuizWinner');
    }
}
