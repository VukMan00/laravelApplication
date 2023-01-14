<?php

namespace App\Http\Controllers;

use App\Models\TestQuestion;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
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
        $testQuestion = TestQuestion::create();
        return response()->json($testQuestion);
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
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$testQuestion_id)
    {
        $testQuestion = TestQuestion::find($testQuestion_id);
        if(is_null($testQuestion)){
            return response()->json('Not found',401);
        }
        else{
            $testQuestion->test_id = $request->test_id;
            $testQuestion->question_id = $request->question_id;
            $testQuestion->update();
            return response()->json('Successfull');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$testQuestion_id)
    {
        $testQuestion = TestQuestion::find($testQuestion_id);
        if(is_null($testQuestion)){
            return response()->json('Not found',401);
        }
        else{
            $testQuestion->test_id = $request->test_id;
            $testQuestion->question_id = $request->question_id;
            $testQuestion->update();
            return response()->json('Successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($testQuestion_id)
    {
        try{
            $testQuestion = TestQuestion::find($testQuestion_id);
            $testQuestion->delete();
            return response()->json("Successfull");
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }
    }
}
