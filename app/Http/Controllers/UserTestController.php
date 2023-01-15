<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

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

    //kreiraj jednog user-a koji ce da polaze dati test
    public function create($test_id)
    {
        $user = new User();
        $user->test_id = $test_id;
        $user->save();
        return response()->json($user);
    }

    public function update($test_id,$user_id,Request $request)
    {
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
