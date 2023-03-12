<?php

namespace App\Http\Controllers;

use App\Question;
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
        $questions = Question::paginate(10);
        return view('admin.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.question.create');
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
        return redirect()->route('admin.question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('admin.question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('admin.question.edit',compact('question'));
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
        $question->update($request->all());
        session()->flash('message','Sửa một câu hỏi thành công');
        return redirect()->route('admin.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
        session()->flash('message','Xóa một câu hỏi thành công');
        return redirect()->route('admin.question.index');
    }


    public function deleteMany(Request $request){
        $ckboxs = $request->ckb;
        if(is_array($ckboxs)){
            foreach ($ckboxs as $key => $value) {
                $question = Question::findOrFail($value);
                $question->delete();
            }
            session()->flash('message','Xóa câu hỏi thành công');
            return redirect()->route('admin.question.index');
        }else{
            return back();
        }
    }
}
