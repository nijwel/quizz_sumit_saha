<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Option;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validated = $request->validate([
            'question'        => 'required|unique:questions|',
            'marks'           => 'required',
            'option_one'      => 'required',
            'is_right_option' => 'required',
        ]);

        $data = New Question();
        $data->quiz_id  = $request->quiz_id;
        $data->question = $request->question;
        $data->marks    = $request->marks;
        $data->save();

        $insertedId = $data->id;

        $option = New Option();
        $option->question_id  = $insertedId;
        $option->option_one   = $request->option_one;
        $option->option_two   = $request->option_two;
        $option->option_three = $request->option_three;
        $option->option_four  = $request->option_four;
        if($request->is_right_option == "a"){
            $option->is_right_option = $request->option_one; 
        }elseif($request->is_right_option == "b"){
            $option->is_right_option = $request->option_two;
        }elseif($request->is_right_option == "c"){
            $option->is_right_option = $request->option_three;
        }elseif($request->is_right_option == "d"){
            $option->is_right_option = $request->option_four;
        }
        $option->save();
        return redirect()->back()->with('success','Successfully Created !');

    

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
        $data = Question::find($id);
        return view('admin.quiz.ajax.edit_question',compact('data'));
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
        $data = Question::find($id);
        $data->question = $request->question;
        $data->marks    = $request->marks;
        $data->save();

        $option = Option::where('question_id',$data->id)->first();

        $option = Option::find($option->id);
        $option->option_one   = $request->option_one;
        $option->option_two   = $request->option_two;
        $option->option_three = $request->option_three;
        $option->option_four  = $request->option_four;
        if($request->is_right_option == "a"){
            $option->is_right_option = $request->option_one; 
        }elseif($request->is_right_option == "b"){
            $option->is_right_option = $request->option_two;
        }elseif($request->is_right_option == "c"){
            $option->is_right_option = $request->option_three;
        }elseif($request->is_right_option == "d"){
            $option->is_right_option = $request->option_four;
        }
        $option->save();
        return redirect()->back()->with('success','Successfully Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Question::find($id)->delete();
        return redirect()->back()->with('success','Successfully Deleted !');
    }
}
