<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    //
    public function index(){
        return view('addUser');
    }
    public function store(UserRequest $request){
        $validated = $request->validated();

        User::create($validated);
        return redirect()->back()->with('success','Added successfully');
    }
    
}
