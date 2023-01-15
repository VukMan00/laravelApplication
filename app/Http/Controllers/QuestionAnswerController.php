<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerCollection;
use Illuminate\Http\Request;
use App\Models\Answer;

class QuestionAnswerController extends Controller
{
    //vraca sve odgovore jednog pitanja
    public function index($question_id)
    {
        $answers = Answer::get()->where('question_id',$question_id);
        if(is_null($answers)){
            return response()->json('Not found',401);
        }
        else{
            return response()->json($answers);
        }
    }
    
    //kreiranje odgovora unutar datog pitanja
    public function create($question_id)
    {
        $answer = new Answer();
        $answer->question_id = $question_id;
        $answer->save();
        return response()->json($answer);
    }

    //izmena odgovora unutar datog pitanja
    public function edit($question_id,$answer_id,Request $request)
    {
        $answer = Answer::find($answer_id);
        if($answer->question_id == $question_id){
            $answer->content = $request->content;
            $answer->answer = $request->answer;
            $answer->update();
            return response()->json($answer);
        }
        else{
            return response()->json('Not found',401);
        }
    }

    public function update($question_id,$answer_id,Request $request)
    {
        $answer = Answer::find($answer_id);
        if($answer->question_id == $question_id){
            $answer->content = $request->content;
            $answer->answer = $request->answer;
            $answer->update();
            return response()->json($answer);
        }
        else{
            return response()->json('Not found',401);
        }
    }

    public function destroy($question_id,$answer_id)
    {
        try{
            $answer = Answer::find($answer_id);
            if($answer->question_id==$question_id && !is_null($answer)){
                $answer->delete();
                return response()->json("Successfull");
            }
            else{
                return response()->json('Not found',401);
            }
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }
    }
}
