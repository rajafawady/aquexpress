<link rel="stylesheet" href="{{asset('styles/auto-order.css')}}">


<x-customer-layout>
     <div class="container col-md-7">
        <div class="card">
            <div class="card-header text-center" style="background-color: #352f44;">
                <h2 >Automatic Order Replacement</h2>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="tankQuantity">Tank Quantity</label>
                        <input type="number" class="form-control" id="tankQuantity" placeholder="Enter quantity"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="replacementPeriod">Replacement Period</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="replacementPeriod" placeholder="Enter period"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text">days</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="replacementTime">Replacement Time</label>
                        <input type="time" class="form-control" id="replacementTime" required>
                    </div>

                    <div class="form-group">
                        <label for="totalBill">Total Bill Per Order</label>
                        <input type="text" class="form-control" id="totalBill" readonly>
                    </div>

                    <button type="button" class="btn btn-block" style="background-color: #352f44;" >Order</button>
                </form>
            </div>
        </div>
    </div>

</x-customer-layout>
