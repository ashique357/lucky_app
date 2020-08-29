<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    protected $table="refers";

    protected $fillable=['user_name','refer_user_name','refer_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
