<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use Str;

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
        return view('admin.quiz.index',compact('data'));
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
            'name'  => 'required|unique:quizzes|',
            'date' => 'required',
        ]);

        $data = New Quiz();
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->date = $request->date;
        $data->save();
        return redirect()->back()->with('success','Successfully Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = Quiz::where('slug',$slug)->first();
        $question = Question::where('quiz_id',$data->id)->with('option')->get();
        return view('admin.quiz.question',compact('data','question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Quiz::find($id);
        return view('admin.quiz.ajax.edit',compact('data'));
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
        $validated = $request->validate([
            'name'  => 'required|unique:quizzes,name,'.$id,
            'date' => 'required',
        ]);

        $data = Quiz::find($id);
        $data->name = $request->name;
        $data->slug = Str::slug($request->name);
        $data->date = $request->date;
        $data->save();
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
        $data = Quiz::find($id)->delete();
        return redirect()->back()->with('success','Successfully Deleted !');
    }
}
