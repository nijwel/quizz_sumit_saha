<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Quiz::all();
        return view('user.quiz.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quizStart($slug)
    {
        $quiz = Quiz::where('slug',$slug)->first();
        $questions = Question::where('quiz_id',$quiz->id)->with('option')->get();
        $marks = Question::where('quiz_id',$quiz->id)->sum('marks');
        return view('user.quiz.start_quiz',compact('questions','quiz','marks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $quiz_id   = $request->quiz_id;
        $question  = $request->question_id;
        $questions = array_combine(range(1, count($question)), $question);
        foreach($questions as $key=> $row){
            $question = Question::where('id',$row)->first();
            $option   = Option::where('question_id',$row)->first();

            $ans = New Answer();
            $ans->question_id = $row;
            $ans->quiz_id     = $request->quiz_id;
            $ans->answer      = $request->answer[$key];
            if($request->answer[$key] == $option->is_right_option){
              $ans->is_right = 'Yes'; 
              $ans->marks    = $question->marks; 
            }else{
               $ans->is_right = 'No'; 
               $ans->marks    = 0; 
            }
            $ans->user_id     = Auth::id();
            $ans->save();
        }
        // return view('user.quiz.result',compact('quiz_id'));
        return redirect()->route('index.user.quiz')->with([ 'quiz_id' => $quiz_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
