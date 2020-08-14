<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class AdminController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user=$user;
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
        return view('Admin.Pages.dashboard');
    }

    public function profile(){
        return view('Admin.Pages.profile');
    }

    public function profileEdit($id){
        $u=$this->user->findOrFail($id);
        return view('Admin.Pages.profile_edit')->with('u',$u);
    }

    public function profileUpdate(){
        dd('profile updated');
    }

}
