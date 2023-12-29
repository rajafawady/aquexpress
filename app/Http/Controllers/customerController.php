<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\User;
use App\Models\Order;
use App\Models\Autoorder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CustomerController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        return view('/customer/index');
    }

    public function showLoginForm(){
        return view('/customer/login');
    }

    public function showRegistrationForm(){
        return view('/customer/register');
    }

    public function about(){
        return view('/customer/about');
    }

    public function contact(){
        return view('/customer/contact');
    }

    public function showAutoOrderForm(){
        return view('/customer/auto-order');
    }

    public function showProfile(){
        return view('/customer/profile',['user'=>auth()->user()]);
    }

    public function showEditProfileForm(){
        
    }

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

    public function orderDetails(Request $request){
        $quantity=$request->quantity;
        $currentTime = time();
        // Get the time 1 hour after the current time
        $timeOneHourLater = strtotime('+1 hour', $currentTime);

        // Format the result as 'H:i'
        $formattedTime = date('H:i', $timeOneHourLater);

        //Storing Delivery Time 1 hour After Current Time
        $time = $request->filled('time') ? $request->time : $formattedTime;
        $date = $request->filled('date') ? $request->date : now()->toDateString();

        if($quantity){
            return view('/customer/orderdetails', compact('quantity','time','date'));
        }else{
            return back()->with('message','Please Choose Order Details First!');
        }
        
    }

    
    public function checkout(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'time' => 'required|date_format:H:i',
            'date' => 'required|date',
            'payment_method' => 'required|in:Online,COD',
            'quantity' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        // Combine date and time into a single string
        $dateTimeString = $validatedData['date'] . ' ' . $validatedData['time'];

        // Convert the combined string to a DateTime object
        $dateTime = new \DateTime($dateTimeString);

        // Create a new order record
        $order = new Order([
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'time' => $dateTime,
            'payment_method' => $validatedData['payment_method'],
            'quantity' => $validatedData['quantity'],
            'amount' => $validatedData['amount'],
            'status' => 'new',
        ]);

        // Assuming you have a relationship between User and Order
        auth()->user()->orders()->save($order);

        // Redirect or return a response as needed
        return redirect('/')->with('message','Order Placed Successfully'); 
    }

    public function autoOrder(Request $request)
    {
        $user=auth()->user();
        // Validate the form data
        $validatedData = $request->validate([
            'payment_method' => 'required|in:Online,COD',
            'time' => 'required|date_format:H:i',
            'period' => 'required|numeric|min:1',
            'quantity' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $order = new Autoorder([
            'address' => $user->address,
            'phone' => $user->phone,
            'time' => $validatedData['time'],
            'payment_method' => $validatedData['payment_method'],
            'quantity' => $validatedData['quantity'],
            'amount' => $validatedData['amount'],
            'period' => $validatedData['period'],
        ]);

        // Assuming you have a relationship between User and Order
        auth()->user()->autoOrders()->save($order);

        // Redirect or return a response as needed
        return redirect('/auto-order')->with('message','Repeating Order Placed Successfully'); 
    }
    // updating user profile

            public function updateProfile(Request $request)
        {
            // Get the currently authenticated user
            $user = Auth::user();

            // Update the user's profile data with the values from the submitted form
            $user->update($request->all());

            // Redirect to the profile page with a success message
            return redirect()->route('profile')->with('success', 'Profile updated successfully!');
        }
        public function deleteProfile()
        {
            // Get the currently authenticated user
            $user = Auth::user();

            // Log the user out
            Auth::logout();
            // Delete the user's account and associated data
            $user->delete();            

            // Redirect to the home page with a success message
            return redirect('/login')->with('message', 'Account deleted successfully!');
        }

}
