<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\LuckyNumber;
use App\DrawHistory;

class DrawHistoryController extends Controller
{
    private $lucky;
    private $draw;

    public function __construct(LuckyNumber $lucky,DrawHistory $draw){
        
        $this->lucky=$lucky;
        $this->draw=$draw;

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

    public function draw(Request $request){
        $winner=$this->lucky->where('lucky_number',$request->lucky_number)->select('user_id')->first();
        
        if($winner){
            $result=new $this->draw;
            $result->lucky_entry_number=$request->lucky_number;
            $result->status=0; //draw will be published
            $result->user_id=$winner->user_id;
            $result->date=Carbon::now();
            $result->save();
            $flag=1;
            $reset=$this->lucky->query()->update(['user_id'=>0]);
            return redirect()->back()->with(['success'=>'Successfully run a lottery','result'=>$result]);
        }
        else{
            $reset=$this->lucky->query()->update(['user_id'=>0]);
            $result=new $this->draw;
            $result->status=0;
            $result->date=Carbon::now();
            $result->lucky_entry_number=$request->lucky_number;
            $result->user_id=0;
            $result->save();
            $flag=0;
            return redirect()->back()->with(['success'=>'Successfully run a lottery','result'=>$result]);
            // return view('Admin.Pages.draw_result')->with(['result'=>$result,'flag'=>$flag]);
        }
    }

    public function index(){
        $histories=$this->draw->latest()->paginate(10);
        return view('Admin.Pages.draw_history')->with('histories',$histories);
    }

    public function publish($id){
        $pub=$this->draw->find($id);
        $pub->status=1;
        $pub->save();
        return redirect()->back()->with('success','Draw has been published!');
    }
}
