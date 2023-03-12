<?php

namespace App\Http\Controllers;

use App\Question;
use Auth;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Auth::user()->questions;
        return view('user.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create($request->all());
        session()->flash('message','Thêm một câu hỏi thành công');
        return redirect()->route('user.question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        if($question->Owned()){
            return view('user.question.show',compact('question'));
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        if($question->Owned()){
            return view('user.question.edit',compact('question'));
        }else{
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        if($question->Owned()){
            $question->update($request->all());
            session()->flash('message','Sửa một câu hỏi thành công');
            return redirect()->route('user.question.index');    
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        if($question->Owned()){
            $question->delete();
            session()->flash('message','Xóa một câu hỏi thành công');
            return redirect()->route('user.question.index');    
        }else{
            return back();
        }
    }
}
