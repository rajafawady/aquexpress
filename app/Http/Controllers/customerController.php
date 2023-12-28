<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=> ['required','email'],
            'password'=>'required',
        ]);
        if(Auth::attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in as a Customer!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function createUser(Request $request){
        $formFields=$request->validate(
            [
                'name'=>'required',
                'phone'=>'required',
                'email'=>['required','email', Rule::unique('users', 'email')],
                'password'=>'required | confirmed | min:6',
                'address'=>'required',
            ]
            );

            
            // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        // Create User
        $user = User::create($formFields);
        Auth::login($user);
        return redirect('/')->with('message', 'User created and logged in');
     }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'You have been logged out!');
    }
}
