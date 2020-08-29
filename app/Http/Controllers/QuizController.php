<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Quiz;
use App\QuizWinner;
use App\GoldHistory;

class QuizController extends Controller{
    private $user;
    private $quiz;
    private $winner;
    public function __construct(User $user,Quiz $quiz,QuizWinner $winner){
        $this->user=$user;
        $this->quiz=$quiz;
        $this->winner=$winner;
    
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

    public function create(){
        $time=Carbon::now()->isoFormat('Do MMMM YYYY');
        if(!($this->quiz)){
            $data="No question is recorded in your system.Please add question";
            $winners="No winner found";
            return view('Admin.Pages.quiz')->with(['data'=>$data,'winners'=>$winners]);    
        }
        else{
            $data=$this->quiz->where(('date'),'>',$time)->get();
            $winners=$this->winner->get();
            return view('Admin.Pages.quiz')->with(['data'=>$data,'winners'=>$winners]);
        }
    }

    public function save(Request $request){
        $dailyQuizz=new $this->quiz;
        $dailyQuizz->question=$request->question;
        $dailyQuizz->answer=$request->answer;
        $dailyQuizz->option1=$request->option1;
        $dailyQuizz->option2=$request->option2;
        $dailyQuizz->option3=$request->option3;
        $dailyQuizz->option4=$request->option4;
        $dailyQuizz->date=Carbon::parse($request->date)->isoFormat('Do MMMM YYYY');
        $dailyQuizz->save();
        return redirect()->back()->with('success','Successfully saved question');
    }

    public function get_winner(Request $request){     
        $quiz=$this->quiz->where('id',$request->id)->firstOrFail();
        $ans=$quiz->answer;
        // $ans=2;
        $get_winner=new $this->winner;
        
        // $get_winner->user_id=2;
        // $get_winner->quiz_id=5;
        // $c_answer=$get_winner->answer=2;
        $get_winner->user_id=$request->user_id;
        $get_winner->quiz_id=$request->quiz_id;
        $get_winner->question=$get_winner->quiz->question;
        $get_winner->username=$get_winner->user->username;
        $c_answer=$get_winner->answer=$request->answer;

        if($ans ==$c_answer){
            $get_winner->is_winner=1;
            $get_winner->user->gold+=1;
            $get_winner->user->update();

            $history=new GoldHistory();
            $history->user_id=$get_winner->user_id;
            $history->user_name=$get_winner->user->username;
            $history->gold=1;
            $history->balance=$get_winner->user->gold+1;
            $history->des="Win daily quiz";
            $history->date=$get_winner->quiz->date;
            $history->save();
        }
        else{
            $get_winner->is_winner=0;
        }
        $get_winner->save();

        return response()->json(array(
            'quiz_id'=>$get_winner->quiz->id,
           'question'=>$get_winner->quiz->question,
           'answer'=>$get_winner->quiz->answer,
           'date'=>$get_winner->quiz->date,
           'user_id'=>$get_winner->user->id,
           'username'=>$get_winner->user->username,
           'is_winner'=>$get_winner->is_winner, 
        ));                
    }

}
