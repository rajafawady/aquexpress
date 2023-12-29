<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class SupplierController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function supplierHome(){
        return view('/supplier/index');
    }

    public function showRegistrationForm(){
        return view('/supplier/index');
    }

    public function showLoginForm(){
        return view('/supplier/supplierLogin');
    }

    public function authenticate(Request $request){
        $formFields=$request->validate([
            'email'=> ['required','email'],
            'password'=>'required',
        ]);
        if(Auth::guard('supplier')->attempt($formFields)){
            $request->session()->regenerate();
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
        Auth::guard('supplier')->login($user);
        return redirect('/supplier')->with('message', 'User created and logged in');
     }

    public function logout(Request $request){
        Auth::guard('supplier')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/supplier/login')->with('message', 'You have been logged out!');
    }

    public function newOrders(Request $request){
        if(!(Auth::guard('supplier')->user())){
            return route('supplier.login');
        }

        $search = $request->get('search');
        if($search){
            $orders = Order::with(['user'])
            ->where('supplier_id', null)
            ->where('status', 'new')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('payment_method', 'like', '%' . $search . '%')
                            ->orWhere('amount', 'like', '%' . $search . '%')
                            ->orWhere('address', 'like', '%' . $search . '%')
                            ->orWhere('quantity', 'like', '%' . $search . '%')
                            ->orWhereHas('user', function ($userQuery) use ($search) {
                                $userQuery->where('name', 'like', '%' . $search . '%');
                            });
                });
            })
            ->get();
        }else{
            $orders = Order::with(['user'])
            ->where('supplier_id', null)
            ->where('status', 'new')
            ->get();
        }
        

        return view('/supplier/neworders',['orders'=>$orders]);
    }

    public function pendingOrders(Request $request){
        $supplier = Auth::guard('supplier')->user();
        $search = $request->get('search');
        // Retrieve orders for the current supplier (user) with status "pending"
        if($search){
            $orders = Order::with(['user'])
            ->where('supplier_id', $supplier->id)
            ->where('status', 'pending')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('payment_method', 'like', '%' . $search . '%')
                            ->orWhere('amount', 'like', '%' . $search . '%')
                            ->orWhere('address', 'like', '%' . $search . '%')
                            ->orWhere('quantity', 'like', '%' . $search . '%')
                            ->orWhereHas('user', function ($userQuery) use ($search) {
                                $userQuery->where('name', 'like', '%' . $search . '%');
                            });
                });
            })
            ->get();
        }else{
            $orders = Order::with('user')
            ->where('supplier_id', $supplier->id)
            ->where('status', 'pending')
            ->get();
        }
        
        return view('/supplier/pendingorders',['orders'=>$orders]);
    }


    public function completedOrders(Request $request){
        $supplier = Auth::guard('supplier')->user();
        $search = $request->get('search');
        if($search){
            $orders = Order::with(['user'])
            ->where('supplier_id', $supplier->id)
            ->where('status', 'completed')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subquery) use ($search) {
                    $subquery->where('payment_method', 'like', '%' . $search . '%')
                            ->orWhere('amount', 'like', '%' . $search . '%')
                            ->orWhere('address', 'like', '%' . $search . '%')
                            ->orWhere('quantity', 'like', '%' . $search . '%')
                            ->orWhereHas('user', function ($userQuery) use ($search) {
                                $userQuery->where('name', 'like', '%' . $search . '%');
                            });
                });
            })
            ->get();
        }else{
            $orders = Order::with('user')
            ->where('supplier_id', $supplier->id)
            ->where('status', 'completed')
            ->get();
        }
        
        return view('/supplier/completedorders',['orders'=>$orders]);
    }

    public function acceptOrder($orderId)
    {
        // Get the currently authenticated supplier
        $supplier = Auth::guard('supplier')->user();

        // Find the order by its ID
        $order = Order::find($orderId);
       
        // Check if the order exists and is not already accepted
        if ($order && strtolower($order->status) === 'new') {
            // Update the order with the supplier_id
            $order->update([
                'supplier_id' => $supplier->id,
                'status' => 'pending', // Adjust the status based on your needs
            ]);
            // Additional logic, e.g., send notifications, update inventory, etc.

            return redirect()->back()->with('message', 'Order Accepted successfully.');
        }

        return redirect()->back()->with('message', 'Invalid order or order already accepted.');
    }

    public function completeOrder($orderId)
    {

        // Find the order by its ID
        $order = Order::find($orderId);
       
        // Check if the order exists and is not already accepted
        if ($order && strtolower($order->status) === 'pending') {
            // Update the order with the supplier_id
            $order->update([
                'status' => 'completed', // Adjust the status based on your needs
            ]);
            // Additional logic, e.g., send notifications, update inventory, etc.

            return redirect()->back()->with('message', 'Order Completed successfully.');
        }

        return redirect()->back()->with('message', 'Invalid order or order already Completed.');
    }

    public function stats(Request $request)
    {
        $month = $request->month;

        if (!$month) {
            $currentDate = new \DateTime();
            $selectedMonth=$currentDate->format('Y-m');
            $year = $currentDate->format('Y');
            $month = $currentDate->format('m');
        } else {
            $selectedMonth=$month;
            list($year, $month) = explode('-', $month);
        }

        $supplierId = Auth::guard('supplier')->user()->id;

        $monthlyOrders = Order::where('supplier_id', $supplierId)
            ->whereRaw("DATE_FORMAT(time, '%Y-%m') = ?", ["$year-$month"])
            ->where('status', 'completed')
            ->get(['time', 'quantity']);

        $salesData = $monthlyOrders->groupBy(function ($item) {
            return date_create($item->time)->format('d');
        })->map(function ($dayOrders) {
            return $dayOrders->sum('quantity');
        });

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $uniqueDates = range(1, $daysInMonth);

        return view('/supplier/stats', compact('salesData', 'uniqueDates','selectedMonth'));
    }

}
