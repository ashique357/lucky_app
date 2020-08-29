<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\User;
use App\Quiz;
use App\QuizWinner;
use App\GoldHistory;

Route::get('/admin/daily-quiz/today',function(){

    $today=Carbon::today()->isoFormat('Do MMMM YYYY');
    $quiz=Quiz::where(('date'),'=',$today)->get();
    return response()->json($quiz);
});

// Route::post('/daily-quiz/today',function(Request $request){
    
//     $data=$request->all();
//     // QuizWinner::create($data);
//     // return response()->json($data);
//     dd($data);
// });