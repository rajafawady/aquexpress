<?php

namespace App\Http\Controllers;


use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=> ['required','email'],
            'password'=>'required',
        ]);
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect('/supplier')->with('message', 'You are logged in as a Supplier!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function createUser(Request $request){
        $formFields=$request->validate(
            [
                'companyName'=>'required',
                'phone'=>'required',
                'email'=>['required','email', Rule::unique('suppliers', 'email')],
                'password'=>'required | confirmed | min:6',
                'address'=>'required',
            ]
            );
            // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        // Create User
        $user = Supplier::create($formFields);
        auth()->login($user);
        return redirect('/supplier')->with('message', 'User created and logged in');
     }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/supplier/login')->with('message', 'You have been logged out!');
    }
}
