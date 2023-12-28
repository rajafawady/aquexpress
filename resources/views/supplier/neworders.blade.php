
    <style>
        .search-btn:hover {
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
    <section>

    <!-- New Orders Section -->
    <div class="container mt-4">
    
        <h2 class="text-center">New Orders</h2>
        <div class="input-group w-25  m-auto">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="button" class="btn search-btn">search</button>
            </div>
    
        <!-- Order Cards -->
        <div class="card-deck mt-4 d-flex flex-column align-items-center ">
            <!-- Order Card 1 -->
            <div class="card m-auto w-75" style="margin-bottom: 20px !important;">
                <div class="card-body d-flex justify-content-between align-items-center ">
                    <!-- Order Details -->
                    <div class="order-details">
                        <p><strong>Order ID:</strong> #12345</p>
                        <p><strong>Customer Name:</strong> John Doe</p>
                        <p><strong>Address:</strong> 123 Main Street, Cityville</p>
                        <p><strong>Quantity:</strong> Full Tank</p>
                        <p><strong>Delivery Time:</strong> 2:00 PM</p>
                        <p><strong>Payment mode:</strong> Credit Card</p>
                        <p><strong>Total Bill:</strong> $50.00</p>
                    </div>
                    <!-- Action Buttons -->
                    <div class="action-buttons d-flex flex-column align-items-end">
                        <button class="btn btn-success accept-btn mb-2 w-100">Accept</button>
                        <button class="btn btn-danger deny-btn w-100" > Deny</button>
                    </div>
                </div>
            </div>
           
    </div>
    </div>
    <!-- new orders end  -->
    



    </Section>
</x-layout>