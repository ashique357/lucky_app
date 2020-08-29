<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable=['user_id','user_name','id_link','status','type','date'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function gold(){
        return $this->hasMany('App\GoldHistory');
    }
}
