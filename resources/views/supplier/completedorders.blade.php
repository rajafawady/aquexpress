
    <style>
        .search-btn:hover{
            background-color: #352f44;
            color: white;

        }
         .card{
            transition: ease-in-out 1s;
        }
        .card:hover{
            transform: scale(1.1);
            box-shadow: 10px 10px 5px #9187aa;
        }
    </style>

<x-layout>




<div class="completed-orders-section m-auto  p-sm-5 ">
    <h2 class="text-center">Completed Orders</h2>
    <div class="input-group w-25  m-auto">
        <input type="search" class="form-control rounded" placeholder="Search by Customer, Payment Method, Amount, Quantity or Address" aria-label="Search"
            aria-describedby="search-addon" />
        <button type="button" class="btn search-btn" >search</button>
    </div>
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