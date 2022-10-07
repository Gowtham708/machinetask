<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
          //create user
    public function index(){
        return view('create');
    }
    //store user
    public function store(Request $request){

      $request->validate([
          'name' => 'required',
          'email' => 'required|unique|email',
          'mobile_no' => 'required',
          'dob' => 'required',
          'address' => 'required'
      ]);

      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'mobile_no' => $request->mobile_no,
          'dob' =>  $request->dob,
          'address' => $request->address
      ]);
      return redirect()->route('list')->with('success','User has been created');
    }
    //list user
    public function list(){
         $users = User::all();
         return view('list',compact('users'));
    }
}
