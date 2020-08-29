<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\LuckyNumber;

class LuckyNumberController extends Controller
{
    private $lucky;
    public function __construct(){
        // $this->lucky=$lucky;
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

    public function index(){
        return view('Admin.Pages.choose_lucky_number');
    }
}
