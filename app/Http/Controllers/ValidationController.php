<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ValidationController extends Controller
{
    public function registerValidation()
    {
        return view('register');
    }

    public function loginpage(){
        return view('login');
    }

    public function validateRegister(Request $request){

       
        $user= $this->validate($request,array(
                                      'name' => 'required|max:255',
                                      'email' => 'required|email|max:255',
                                      'password' => 'required|min:6',
                                      'confirm_password' => 'required|same:password|min:6'
              )
                              );
              
              
          
              
                Register::create(array(
                              'name' => $request->name, 
                              'email' => $request->email,
                              'password' => bcrypt($request->password),
                              'confirm_password'=>bcrypt($request->password)
              ));
            
           
              return redirect('/login')->with('success','Registered Successfully');
            
        }
       
        
           public function loginForm(Request $request){
                             
            $var= $this->validate($request,[
               'email' => 'required|email|max:255',
        
               'password' => 'required|min:6'
            ]);
           $user = Register::where('email',$request->email)->first();
        
           if($user && Hash::check($request->password,$user->password)){
        
               Session::put('id',$user->id);
                Session::put('email',$request->email);
        
               return redirect()->route('list')->with('success','Login Successfully' ); 
           }
            else{
                return back()->with('error','Invalid Login Credentials');
            }
        }

        // public function logout()
        // {
        //     Session::flush();
        //     return redirect('/admin-login');
        // }
}
