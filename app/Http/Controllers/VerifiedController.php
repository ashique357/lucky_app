<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Verified;
use DataTables;


class VerifiedController extends Controller
{
    private $verified;
    public function __construct(Verified $verified){
        $this->verified=$verified;
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
        $data=$this->verified->latest()->get();
        return view('Admin.Pages.verified_request')->with('data',$data);
    }

    public function accept($id){
        $account=$this->verified->where('id',$id)->firstOrFail();
        $account->status=1;
        $account->user->verified=1;
        $account->save();
        $account->user->save();
        return redirect()->back()->with('success','$account->user->name request is accepted');
    }

    public function reject($id){
        $account=$this->verified->where('id',$id)->firstOrFail();
        $account->status=0;
        $account->user->verified=0;
        $account->save();
        $account->user->save();
        return redirect()->back()->with('success','$account->user->name request is rejected');
    }
}
