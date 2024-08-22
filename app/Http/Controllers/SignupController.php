<?php

namespace App\Http\Controllers;



use App\Models\UserMongo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function signup(Request $request){
        $user = UserMongo::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['user' => $user], 201);
    }
}
