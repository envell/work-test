<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
class UserController extends Controller
{

    public function index()
    {
        return response()->json(User::all(), 200);
    }
    
    public function find(Request $request)
    {   
        $email = $request->input('email');
        $password = $request->input('password');
        return response()->json(User::findOrFail($email, $password), 200);
    }
    
    public function show($id)
    {
        return response()->json(User::findOrFail($id), 200);
    }
    public function test()
    {
        return response()->json(User::findOrFail(1), 200);
    }
}