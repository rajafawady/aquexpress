
<x-layout>




<div class="completed-orders-section m-auto  p-sm-5 ">
    <h2 class="text-center">Completed Orders</h2>
    
    <form action="/supplier/completedorders" method="GET">
        <div class="input-group w-75 m-auto">
            <input type="search" class="form-control rounded" name="search" placeholder="Search by Customer, Payment Method, Amount, Quantity or Address" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn search-btn">Search</button>
        </div>
    </form>
    <!-- Order Card -->
    <div class="listing-completed-order d-flex flex-row justify-content-center align-items-center flex-wrap m-5">

        @unless(count($orders) == 0)
            @foreach ($orders as $order)
                
            <div class="card m-auto w-75" style="margin-bottom: 20px !important;">
                <div class="card-body d-flex justify-content-between align-items-center ">
                    <!-- Order Details -->
                    <div class="order-details">
                        <p><strong>Order ID:</strong>{{$order->id}}</p>
                        <p><strong>Customer Name:</strong>{{$order->user->name}}</p>
                        <p><strong>Address:</strong>{{$order->address}}</p>
                        <p><strong>Quantity:</strong>{{$order->quantity}}</p>
                        <p><strong>Delivery Time:</strong>{{$order->time}}</p>
                        <p><strong>Payment mode:</strong>{{$order->payment_method}}</p>
                        <p><strong>Total Bill:</strong>{{$order->amount}}</p>
                    </div>
                </div>
            </div>            
            @endforeach

            @else
            <div class="container p-5">
                <p class="text-center text-danger">No Orders Found</p>
            </div>
            @endunless


    </div>
</div>
<!-- end of completed orders -->

    

</x-layout>