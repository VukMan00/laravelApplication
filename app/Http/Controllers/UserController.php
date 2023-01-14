<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return new UserCollection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $user = User::create();
       return response()->json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$user_id)
    {
        $user = User::find($user_id);
        if(is_null($user)){
            return response()->json('Not found',401);
        }
        else{
            $user->username = $request->username;
            $user->email = $request->email;
            $user->author = $request->author;
            $user->password = $request->password;
            $user->test_id = $request->test_id;
            $user->update();
            return response()->json('Successfull');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if(is_null($user)){
            return response()->json('Not found',401);
        }
        else{
            $user->username = $request->username;
            $user->email = $request->email;
            $user->author = $request->author;
            $user->password = $request->password;
            $user->test_id = $request->test_id;
            $user->update();
            return response()->json('Successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        try{
            $user = User::find($user_id);
            $user->delete();
            return response()->json("Successfull");
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json($e);
        }
    }
}
