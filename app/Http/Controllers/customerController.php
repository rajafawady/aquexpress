<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\User;
use App\Models\Order;
use App\Models\Autoorder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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

    public function showOrderForm(){
        return view('/customer/order');
    }

    public function showProfile(){
        $user=Auth::user();
        $locationName= $this->getLocationName($user->address);
        $user->address=$locationName;
        return view('/customer/profile',['user'=>$user]);
    }

    public function showEditProfileForm(){
        return view('/customer/editprofile',['user'=>auth()->user()]);
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
        $user=auth()->user();
        $locationName= $this->getLocationName($user->address);
        $user->address=$locationName;
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
        $locationName= $this->getLocationName($user->address);
        $user->address=$locationName;
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
         
            $formFields=$request->validate(
                [
                    'name'=>'required',
                    'phone'=>'required',
                    'email'=>['required','email'],
                    'address'=>'required',
                    'picture'=>''
                ]
                );
                if ($request->hasFile('picture')) {
                    $profile = $request->file('picture')->store('uploads', 'public');
                    $formFields['picture'] = $profile;
                }
                
                
            // Get the currently authenticated user
            $user = Auth::user();

            // Update the user's profile data with the values from the submitted form
            $user->update($formFields);

            // Redirect to the profile page with a success message
            return redirect('/profile')->with('message', 'Profile updated successfully!');
        }


        public function deleteProfile(Request $request)
        {
            $user = Auth::user();

            if ($user) {
                try {
                    // Use a transaction to ensure atomicity
                    DB::beginTransaction();

                    // Log to help debugging
                    Log::info('Attempting to delete user: ' . $user->id);

                    // Delete related records in autoorders table
                    $user->autoOrders()->delete();

                    // Delete related records in orders table
                    $user->orders()->delete();

                    // Delete the user
                    $user->delete();
                    
                    // Logout the user
                    Auth::logout();

                    // Clear the user's session data
                    Session::flush();

                    // Commit the transaction
                    DB::commit();

                    return redirect('/login')->with('message', 'Account deleted successfully.');
                } catch (\Exception $e) {
                    // An error occurred, rollback the transaction
                    DB::rollback();

                    return back()->with('message', 'Error deleting account. Please try again.');
                }
            }

            return back()->with('message', 'User not found.');
        }

        public function getLocationName($address)
    {
        // Replace 'YOUR_API_KEY' with your actual Google Maps API key
        $apiKey = 'AIzaSyAIB_S7iWfKDLTyUs0Siq-DvgXmDf4vdjA';
        $baseUrl = 'https://maps.googleapis.com/maps/api/geocode/json';

        // Make a request to the Geocoding API
        $response = Http::get($baseUrl, [
            'latlng' => "$address",
            'key' => $apiKey,
        ]);

        // Decode the JSON response
        $data = $response->json();

        // Check if the request was successful
        if ($response->successful() && $data['status'] === 'OK') {
            // Extract the formatted address from the results
            $formattedAddress = $data['results'][0]['formatted_address'];

            return $formattedAddress;
        }

        // Handle the case where the request was not successful
        return null;
    }

    public function sendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send mail
        Mail::send('emails.contact', ['data' => $validatedData], function ($message) use ($validatedData) {
            $message->to('rajafawady@gmail.com', 'Fawad')->subject('New Contact Form Submission');
            $message->from($validatedData['email'], $validatedData['name']);
        });

        return redirect()->back()->with('message', 'Your message has been sent successfully!');
    }

        
}
