<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(){
        return view('login.index' , [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password'=> 'required'
        ]);

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/');
        // }

        $user = User::where('email','=',$credentials['email'])->first();

        if($user) {
            if(Auth::attempt($credentials, $user->password)) {
                $request->session()->regenerate();
                if($user->role_id == 1) {
                    session([
                        'id_user' => $user->id,
                    ]);
                    session([
                        'role_id' => $user->role_id
                    ]);
                    return redirect()->intended('admin');
                }  else if($user->role_id == 2) {
                    session([
                        'id_user' => $user->id,
                    ]);
                    session([
                        'role_id' => $user->role_id
                    ]);
                    return redirect()->intended('/');
                }
            }
                return back()->with('LoginError', 'Login Failed');
        }
                
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        
        return redirect('/');       
    }
}
