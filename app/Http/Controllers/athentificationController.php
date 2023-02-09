<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class athentificationController extends Controller
{

    // public function register(Request $request) {
    //     $this->validate($request,[
    //         'name' => 'required',
    //         'email' => 'email|required',
    //         'password' => 'required'
    //     ]);
    //     $user = User::create([
    //         'name' =>$request->name,
    //         'email' =>$request->email,
    //         'password' => Hash::make($request->name)
    //     ]);
    //     return new UserResource($user);
    // }

    // public function login(Request $request) {
    //     $this->validate($request,[
    //         'email' => 'required',
    //         'password' => 'required'
    //     ]);

    //     $user = User::whereEmail($request->email)->first();
    //     if (isset($user->id)) {
    //         if (Hash::check($request->password,$user->password)) {

    //             return response()->json([
    //                 "message" => 'invalid password',
    //             ]);
    //         }else {
    //             $token = $user->createToken('Token')->plainTextToken;
    //             return response()->json([
    //                 "message" => 'connected good',
    //                 "token" => $token
    //             ]);
    //         }
    //     }else {
    //         return response()->json([
    //             "message" => 'invalid email',
    //         ]);
    //     }
    // }

    // public function get_users() {
    //     $users = User::all();
    //     // return new UserResource($users);
    //     return response()->json($users);
    // }

    // public function profile() {
    //     return response()->json(auth()->user());
    //     // return new UserResource(auth()->user);
    // }

    // public function log_out() {
    //     auth()->user()->tokens()->delete();
    //     return response()->json([
    //         "message" => 'log out good',
    //     ]);
    // }
}
