<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\Test;
use App\Models\User;
use App\Models\UserTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserTestController extends Controller
{
    //vrati sve user-e koji polazu dati test
    public function index($test_id)
    {
        $usersTest = UserTest::get()->where('test_id',$test_id);
        $users = array();
        foreach($usersTest as $userTest){
            $users[] = User::get()->where('id',$userTest->user_id);
        }
        if(is_null($users)){
            return response()->json('Not found',401);
        }
        else{
            return response()->json($users);
        }
    }

    public function store($test_id,Request $request)
    {

        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::find($request->user_id);
        $test = Test::find($test_id);
        if(is_null($user) || is_null($test)){
            return response()->json('Not found',401);
        }
        else{
            $userTest = new UserTest();
            $userTest->test_id = $test_id;
            $userTest->user_id = $request->user_id;
            $userTest->save();
            return response()->json($userTest);
        }
    }

    /*public function update($test_id,$user_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $userTest = UserTest::where('test_id',$test_id)->where('user_id',$user_id)->get();
        if(is_null($userTest)){
            return response()->json("Not found",401);
        }
        else{
            $userTest->user_id = $request->user_id;
            $userTest->update();
            return response()->json("Successfull");
        }
    }

    
    public function edit($test_id,$user_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $userTest = UserTest::where('test_id',$test_id)->where('user_id',$user_id)->get();
        if(is_null($userTest)){
            return response()->json("Not found",401);
        }
        else{
            $userTest->user_id = $request->user_id;
            $userTest->update();
            return response()->json("Successfull");
        }
    }*/

    //brisanje user-a sa testa
    public function destroy($test_id,$user_id)
    {
        try{
            $userTest = UserTest::where('user_id',$user_id)->where('test_id',$test_id)->get();
            if(is_null($userTest)){
                return response()->json("Not found",401);
            }
            else{
                $userTest->each->delete();
                return response()->json("Successfull");
            }
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }
    }
}
