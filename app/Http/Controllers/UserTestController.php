<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserTestController extends Controller
{
    //vrati sve user-e koji polazu dati test
    public function index($test_id)
    {
        $users = User::get()->where('test_id',$test_id);
        if(is_null($users)){
            return response()->json('Not found',401);
        }
        else{
            return response()->json($users);
        }
    }

    public function update($test_id,$user_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=>'required|string|max:255|unique:users',
            'email'=>'required|string|email|max:255|unique:users',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $user = User::find($user_id);
        if($user->test_id == $test_id){
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->update();
            return response()->json("Successfull");
        }
        else{
            return response()->json("Not found",401);
        }
    }

    
    public function edit($test_id,$user_id,Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=>'required|string|max:255|unique:users',
            'email'=>'required|string|email|max:255|unique:users',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        
        $user = User::find($user_id);
        if($user->test_id == $test_id){
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->update();
            return response()->json("Successfull");
        }
        else{
            return response()->json("Not found",401);
        }
    }

    public function destroy($test_id,$user_id)
    {
        try{
            $user = User::find($user_id);
            if($user->test_id==$test_id && !is_null($user)){
                $user->delete();
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
