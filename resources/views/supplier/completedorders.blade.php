
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
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
        <button type="button" class="btn search-btn" >search</button>
    </div>
    <!-- Order Card -->
    <div class="listing-completed-order d-flex flex-row justify-content-center align-items-center flex-wrap m-5">

        <div class="card order-card m-3 ">
            <div class="card-body order-details">
                <p class="card-text"><strong>Order ID:</strong> #12346</p>
                <p class="card-text"><strong>Customer Name:</strong> Jane Smith</p>
                <p class="card-text"><strong>Address:</strong> 456 Oak Street, Townsville</p>
                <p class="card-text"><strong>Quantity:</strong> Half Tank</p>
                <p class="card-text"><strong>Delivery Time:</strong> 3:30 PM</p>
                <p class="card-text"><strong>Mode of Payment:</strong> PayPal</p>
                <p class="card-text"><strong>Total Bill:</strong> $30.00</p>
            </div>
            
        </div>


    </div>
</div>
<!-- end of completed orders -->

    

</x-layout>