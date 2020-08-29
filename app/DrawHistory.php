<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrawHistory extends Model
{
    protected $table="draw_histories";

    protected $fillable=['lucky_entry_number','status','user_id','lottery_id','date'];

    // protected $hidden=[];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function LuckyNumber(){
        return $this->hasMany('App\LuckyNumber');
    }
}
