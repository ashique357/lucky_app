<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verified extends Model
{
    protected $fillable=['user_id','id_link','status'];
    
    protected $hidden=[
        
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
