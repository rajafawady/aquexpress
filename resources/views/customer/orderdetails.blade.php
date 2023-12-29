    <x-customer-layout>

        <div class="container my-5 ">
        
            <form class="needs-validation" method="POST" action="/checkout">
                @csrf
            
                <div class="row">

                <div class="col-md-8 order-md-1">
                <h4 class="mb-3 text-muted">Shipping Information</h4>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="{{auth()->user()->address}}" required>
                        @error('address')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <h4 class="mb-3 text-muted">Contact Information</h4>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="{{auth()->user()->email}}" required>
                            @error('email')
                            <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" placeholder="123-456-7890" name="phone" value="{{auth()->user()->phone}}" required>
                            @error('phone')
                                <p class="text-danger text-lg mt-1">{{$message}}</p>
                                @enderror
                        </div>
                    </div>

                    <h4 class="mb-3 text-muted">Delivery Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" value="{{$time}}" name= "time" required>
                            @error('time')
                            <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>  
                        <div class="col-md-6 mb-3">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$date}}"  required>
                        </div>
                    </div>

                    <!-- Payment and Complete Order Section -->
                    <hr class="mb-4">
                    <h4 class="mb-3 text-muted">Payment</h4>

                    <div class="mb-3">
                        <label for="paymentMethod">Payment Method</label>
                        <select class="custom-select d-block w-100" id="paymentMethod" name="payment_method" required>
                            <option value="">Choose...</option>
                            <option value="Online">Online</option>
                            <option value="COD">Cash on Delivery</option>
                        </select>
                        @error('payment_method')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                    </div>

                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your Order</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <!-- List items in the cart go here -->
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Quantity</h6>
                                </div>
                                <span class="text-muted">{{$quantity==0.5 ? 'Half Tank' : 'Full Tank'}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Amount</span>
                                <strong>{{$quantity*3000}} Rs</strong>
                            </li>
                        </ul>
                        <input type="hidden" name="quantity" value="{{$quantity}}">
                        <input type="hidden" name="amount" value="{{$quantity*3000}}">
                        <button class="btn  btn-lg btn-block " style="background-color: #352f44;color:white" type="submit">Continue to Checkout</button>
                    
                    </div>

                    </div>
                </form>
    </div>

    
</x-customer-layout>