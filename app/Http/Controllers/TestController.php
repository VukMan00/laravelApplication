<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestCollection;
use App\Http\Resources\TestResource;
use App\Models\Test;
use Illuminate\Http\Request;
use PHPUnit\TextUI\TestRunner;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return new TestCollection($tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = Test::create();
        return response()->json($test);
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
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */

    public function show(Test $test)
    {
        return new TestResource($test);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$test_id)
    {
        $test = Test::find($test_id);
        if(is_null($test)){
            return response()->json('Not found',401);
        }
        else{
            $test->name = $request->name;
            $test->points = $request->points;
            $test->author = $request->author;
            $test->update();
            return response()->json('Successfull');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$test_id)
    {
        $test = Test::find($test_id);
        if(is_null($test)){
            return response()->json('Not found',401);
        }
        else{
            $test->name = $request->name;
            $test->points = $request->points;
            $test->author = $request->author;
            $test->update();
            return response()->json('Successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($test_id)
    {
        try{
            $test = Test::find($test_id);
            $test->delete();
            return response()->json("Successfull");
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }
    }
}
