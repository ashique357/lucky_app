<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    protected $table="point_histories";

    protected $fillable=['user_id','username','point','balance','des','date'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
