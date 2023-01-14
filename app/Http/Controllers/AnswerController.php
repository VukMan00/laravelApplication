<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerCollection;
use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::all();
        return new AnswerCollection($answers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $answer = Answer::create();
        return response()->json($answer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */

    public function show(Answer $answer)
    {
      return new AnswerResource($answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$answer_id)
    {
        $answer = Answer::find($answer_id);
        if(is_null($answer)){
            return response()->json('Not found',401);
        }
        else{
            $answer->content = $request->content;
            $answer->answer = $request->answer;
            $answer->question_id = $request->question_id;
            $answer->update();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $answer_id)
    {
        $answer = Answer::find($answer_id);
        if(is_null($answer)){
            return response()->json('Not found',401);
        }
        else{
            $answer->content = $request->content;
            $answer->answer = $request->answer;
            $answer->question_id = $request->question_id;
            $answer->update();
            return response()->json("Successfull"); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($answer_id)
    {
        try{
            $answer = Answer::find($answer_id);
            $answer->delete();
            return response()->json("Successfull");
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }

    }
}
