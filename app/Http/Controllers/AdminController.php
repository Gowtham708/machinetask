<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    public function adminindex(){
        return view('create');
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:15'
        ]);

        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);
                $users = User::all();
                return view('list',compact('users'));
                // redirect to profile page
            } else {
                return back()->with('fail', "Invalid pass");
            }
        } else {
            return back()->with('fail', "NO Account Found");
        }
    }

        //admin  logout
        public function logout()
        {
            Session::flush();
            return redirect('/admin-login');
        }

        public function get_student_data()
        {
            return Excel::download(new UserExport, 'users.xlsx');
        }
}
