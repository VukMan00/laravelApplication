<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerCollection;
use App\Http\Resources\AnswerResource;
use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Validator;

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
            return new AnswerCollection(new AnswerResource($answers));
        }
    }
    
    //kreiranje odgovora unutar datog pitanja
    public function store(Request $request,$question_id)
    {
        $validator = Validator::make($request->all(),[
            'content'=>'required|string|max:255',
            'answer'=>'required|boolean',
            'question_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if($question_id == $request->question_id){
            $answer = Answer::create([
                'content'=>$request->content,
                'answer'=>$request->answer,
                'question_id'=>$request->question_id
            ]);
            return response()->json(new AnswerResource($answer));
        }
        else{
            return response()->json('Not found',401);
        }
    }

    //izmena odgovora unutar datog pitanja
    public function edit($question_id,$answer_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'content'=>'required|string|max:255',
            'answer'=>'required|boolean',
            'question_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $answer = Answer::find($answer_id);
        if($answer->question_id == $question_id){
            $answer->content = $request->content;
            $answer->answer = $request->answer;
            $answer->update();
            return response()->json(new AnswerResource($answer));
        }
        else{
            return response()->json('Not found',401);
        }
    }

    public function update($question_id,$answer_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'content'=>'required|string|max:255',
            'answer'=>'required|boolean',
            'question_id'=>'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $answer = Answer::find($answer_id);
        if($answer->question_id == $question_id){
            $answer->content = $request->content;
            $answer->answer = $request->answer;
            $answer->update();
            return response()->json(new AnswerResource($answer));
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
