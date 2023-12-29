<link rel="stylesheet" href="{{asset('styles/auto-order.css')}}">


<x-customer-layout active='auto-order'>
     <div class="container col-md-7">
        <div class="card">
            <div class="card-header text-center" style="background-color: #352f44;">
                <h2 >Automatic Order Replacement</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="/auto-order">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <Select class="form-control" id="quantity" name='quantity'>
                          <option value="0.5">Half Tank</option>
                          <option value="1">Full Tank</option>
                        </Select>
                        @error('quantity')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                      </div>

                    <div class="form-group">
                        <label for="replacementPeriod">Replacement Period</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="replacementPeriod" placeholder="Enter period" name="period"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text">days</span>
                            </div>
                        </div>
                        @error('period')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="replacementTime">Delivery Time</label>
                        <input type="time" name="time" class="form-control" id="replacementTime" required>
                        @error('time')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="paymentMethod">Payment Method</label>
                        <select class="custom-select form-control" id="paymentMethod" name="payment_method" required>
                            <option value="">Choose...</option>
                            <option value="Online">Online</option>
                            <option value="COD">Cash on Delivery</option>
                        </select>
                        @error('payment_method')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="totalBill">Total Bill Per Order</label>
                        <input type="text" class="form-control" name="amount" id="totalBill" readonly>

                        @error('amount')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-block" style="background-color: #352f44;" >Order</button>
                </form>
            </div>
        </div>
    </div>

</x-customer-layout>


<script>
    var quantity=document.getElementById('quantity');
    document.getElementById("totalBill").value=quantity.value*3000;
    quantity.addEventListener('change',function(){
        document.getElementById("totalBill").value=quantity.value*3000;
    });

</script>