<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Deposit;
use App\GoldHistory;

class DepositController extends Controller
{
    private $user;
    private $deposit;

    public function __construct(User $user,Deposit $deposit){
        
        $this->user=$user;
        $this->deposit=$deposit;

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

    public function indexRequest(){
        $deposit=$this->deposit->where('type',1)->latest()->get();
        return view('Admin.Pages.deposit')->with('deposit',$deposit);
    }

    public function index(){
        $deposit=$this->deposit->where('type',0)->latest()->get();
        return view('Admin.Pages.depositOther')->with('deposit',$deposit);
    }

    public function accept($id){
        $deposit=$this->deposit->where('id',$id)->firstOrFail();
        $deposit->status=1;
        if($deposit->type==1){
            $deposit->user->gold+=10;
            $deposit->user->save();
            $gold=new GoldHistory();
            $gold->user_id=$deposit->user_id;
            $gold->user_name=$deposit->user_name;
            $gold->gold=10;
            $gold->balance+=10;
            $gold->des="deposit Casino brand A";
            $gold->date=Carbon::now()->isoFormat('Do MMMM YYYY');
            $gold->save();
        }
        elseif($deposit->type==0){
            $deposit->user->gold+=5;
            $deposit->user->save();
            $gold=new GoldHistory();
            $gold->user_id=$deposit->user_id;
            $gold->user_name=$deposit->user_name;
            $gold->gold=5;
            $gold->balance+=5;
            $gold->des="Deposit other casino Brands";
            $gold->date=Carbon::now()->isoFormat('Do MMMM YYYY');
            $gold->save();
        }
        $deposit->save();
        return redirect()->back()->with('success','Deposit request accepted');
    }

    public function decline($id){
        $deposit=$this->deposit->where('id',$id)->firstOrFail();
        $deposit->status=0;
        $deposit->save();
        return redirect()->back()->with('warning','Deposit request declined');
    }
}
