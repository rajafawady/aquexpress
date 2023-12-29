<link rel="stylesheet" href="{{asset('styles/order.css')}}">


<x-customer-layout active='order'>


    <!--Book Now Starts-->
    <div class="container ">
        <div class="book-heading text-center">
            <h2>Your Time, Your Choice, Book and Rejoice</h2>
            <hr>
            
    
        </div>
        <div  >
            
            <div>
                <div  class="btn-group " role="group" aria-label="Order Buttons">
                    <button type="button" class="btn text-white" style="background-color: #352f44;" id="orderNowBtn">Order Now</button>
                    <button type="button" class="btn  text-white" style="background-color: #352f44;" id="scheduleOrderBtn">Schedule Order</button>
                </div>
                <div id="order-form">
                <form class="form">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <Select class="form-control" id="quantity">
                            <option value="Full">Half Tank</option>
                            <option value="Full">Full Tank</option>
                        </Select>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input class="form-control" type="time" id="time" name="time" required value="{{old('time')}}">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input class="form-control" type="date" id="date" name="date" required value="{{old('date')}}">
                    </div>
                    <div class="right">
                        <button class="submit-button btn text-white" style="background-color: #352f44;" type="submit">Book Your Tank</button>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
    </div>
            <script>
          var container=document.getElementById("order-form");
          var orderNowForm=`<form class="form" method="GET" action="/orderdetails">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <Select id="quantity" name='quantity'>
                  <option value="0.5">Half Tank</option>
                  <option value="1">Full Tank</option>
                </Select>
              </div>
              <div class="right">
                <button class="submit-button btn text-white" type="submit">Book Your Tank</button>
              </div>
              
            </form>`;
            container.innerHTML=orderNowForm;
              
          document.getElementById('orderNowBtn').addEventListener('click', function () {
            container.innerHTML=orderNowForm;
            
          });
          
          document.getElementById('scheduleOrderBtn').addEventListener('click', function () {
            var scheduleOrderForm = `<form class="form"  method="GET" action="/orderdetails">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <Select id="quantity" name="quantity" required>
                  <option value="0.5">Half Tank</option>
                  <option value="1">Full Tank</option>
                </Select>
              </div>
              <div class="form-group">
                <label for="time">Time</label>
                <input type="time" id="time" name="time" required value="{{old('time')}}">
              </div>
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required value="{{old('date')}}">
              </div>
              <div class="right">
                <button class="submit-button btn text-white" type="submit">Book Your Tank</button>
              </div>
              
            </form>`;
            document.getElementById('order-form').innerHTML=scheduleOrderForm;
          });
        </script>
</x-customer-layout>