<?php

namespace App\Http\Controllers;
use App\usercontest;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Contest;
use App\Question;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class user_contest_controller extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkactive');
    }
    public function index(){
        $C = DB::table('contests')->where('active','=',true)->first();
        $question = DB::table('questions')->where('id','=',$C->currentquestion_id)
            ->where('contest_id','=',$C->id)
            ->first();
        $answers = DB::table('questions_answers')
            ->where('question_id','=',$question->id)
            ->get(); 
        return view('usercontest.show',compact('question'),compact('answers'));
    }               
    public function transmit_answer(Request $request){//Gui Dap An Len Table History
        $history = new History;
        $history->user_id=$request['user_id'];
        $history->contest_id=$request['contest_id'];
        $history->question_id=$request['question_id'];
        $history->questions_answer_id=$request['questions_answer_id'];
        $history->save();
        return view('UserContest'); 
    }
    public function show_histories(){
        $question = DB::table('histories')->where('user_id','=',$id)->get();
         return view('usercontest.show_histories',compact('question'));//
    }
    public function time() {
        echo("1\n");
        echo(now()."\n");
        echo(date("Y-m-d H:i:s")."\n");
        echo(1);
    }
}

