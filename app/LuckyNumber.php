<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuckyNumber extends Model
{
    protected $table="lucky_numbers";

    protected $fillable=['user','lucky_number'];

    public function admin(){
        return $this->belongsTo('App\User','role:1');
    }

    public function DrawHistory(){
        return $this->hasMany('App\DrawHistory');
    }
}
