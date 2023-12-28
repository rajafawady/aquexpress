    <x-customer-layout>

        <div class="container my-5 ">
        
            <form class="needs-validation" novalidate>
            
                <div class="row">

                <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Shipping Information</h4>
                
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" name="firstName" required >
                            @error('firstName')
                            <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" name="lastName" required>
                            @error('lastName')
                            <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required>
                        @error('address')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <h4 class="mb-3">Contact Information</h4>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" required>
                        @error('email')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <h4 class="mb-3">Delivery Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" placeholder="" name= "city" required>
                            @error('city')
                            <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="postalCode">Postal Code</label>
                            <input type="text" class="form-control" id="postalCode" placeholder=""  required>
                            
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" placeholder="123-456-7890" name="phone" required>
                        <@error('phone')
                            <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                    </div>

                    <!-- Payment and Complete Order Section -->
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>

                    <div class="mb-3">
                        <label for="paymentMethod">Payment Method</label>
                        <select class="custom-select d-block w-100" id="paymentMethod" name="payment_Method" required>
                            <option value="">Choose...</option>
                            <option value="online">Online</option>
                            <option value="cod">Cash on Delivery</option>
                        </select>
                        @error('payment_Method')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    
                    </div>

                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your Cart</span>
                            <span class="badge badge-secondary badge-pill">3</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <!-- List items in the cart go here -->
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Product 1</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Product 2</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>$20</strong>
                            </li>
                        </ul>
                    
                    </div>

                    </div>

                    <button class="btn  btn-lg btn-block " style="background-color: #352f44;color:white" type="submit">Continue to Checkout</button>
                </form>
    </div>

    
</x-customer-layout>