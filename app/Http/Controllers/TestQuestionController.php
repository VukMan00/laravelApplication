<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Models\Question;
use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TestQuestionController extends Controller
{
    //vrati sva pitanja jednog testa
    public function index($test_id)
    {
        $testQuestions = TestQuestion::get()->where('test_id',$test_id);
        $questions = array();
        foreach($testQuestions as $testQuestion){
            $questions[] = Question::get()->where('id',$testQuestion->question_id);
        }
        if(is_null($questions)){
            return response()->json('Not found',401);
        }
        else{
            return response()->json($questions);
        }
    }

    //dodavanje pitanja testu
    public function store($test_id,Request $request)
    {

        $validator = Validator::make($request->all(),[
            'question_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $testQuestion = new TestQuestion();
        $testQuestion->test_id = $test_id;
        $testQuestion->question_id = $request->question_id;
        $testQuestion->save();
        return response()->json($testQuestion);
    }

    public function update($test_id,$question_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'question_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $testQuestion = TestQuestion::where('test_id',$test_id)->where('question_id',$question_id)->get();
        if(is_null($testQuestion)){
            return response()->json("Not found",401);
        }
        else{
            $testQuestion->question_id = $request->question_id;
            $testQuestion->update();
            return response()->json("Successfull");
        }
    }

    public function edit($test_id,$question_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'question_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $testQuestion = TestQuestion::where('test_id',$test_id)->where('question_id',$question_id)->get();
        if(is_null($testQuestion)){
            return response()->json("Not found",401);
        }
        else{
            $testQuestion->question_id = $request->question_id;
            $testQuestion->update();
            return response()->json("Successfull");
        }
    }

    //brisanje pitanja sa testa
    public function destroy($test_id,$question_id)
    {
        try{
            $testQuestion = TestQuestion::where('test_id',$test_id)->where('question_id',$question_id)->get();
            if(is_null($testQuestion)){
                return response()->json("Not found",401);
            }
            else{
                $testQuestion->each->delete();
                return response()->json("Successfull");
            }
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }
    }
}
