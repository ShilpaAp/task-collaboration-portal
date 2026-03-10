<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showlogin() {
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            
            Session::put('loginId', $user->id);
            Session::put('role', $user->role);

            if($user->role === 'Admin'){
                return redirect()->route('admin.dashboard');
            }
            else if($user->role === 'Developer') {
                return redirect()->route('developer.dashboard');
            }
            else {
               return redirect()->route('client.dashboard');
               
            }
        }
        return back()->with('error', 'Invalid credentials');
    }

    public function viewAdmin() {
        return view('admin.dashboard');
    }
    public function viewAdmin_dev() {
        $developers = User::where('role', 'Developer')->get();
        return view('admin.developer', compact('developers'));
    }

    public function viewAdmin_client() {
        $clients = User::where('role', 'Client')->get();
        return view('admin.client', compact('clients'));
    }

     public function logout(){
        Session::forget('loginId');
        return redirect()->route('loginform');
    }

}
