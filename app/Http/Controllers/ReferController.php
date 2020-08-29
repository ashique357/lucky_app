<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Refer;
use App\User;

class ReferController extends Controller
{
    private $user;
    private $refer;

    public function __construct(User $user,Refer $refer){
        
        $this->user=$user;
        $this->refer=$refer;

        $this->middleware(function($request,$next){
            $this->u=Auth::check();
            if($this->u==false){
                return redirect('/login');
            }
            else{
                $this->u=Auth::user();
                if($this->u->role ==1){
                    return $next($request);
                }
                else{
                    return redirect('/login');
                }
            }
        });
    }

    
}
