    <style>
        .card{
            transition: ease-in-out 1s;
        }
        .card:hover{
            transform: scale(1.1);
            box-shadow: 10px 10px 5px #9187aa;
        }
    </style>


<x-layout>

    <Section>
       
        <div class="container mt-4 p-5">
            <div class="row justify-content-around">

                <!-- Bootstrap Card with Shadow and Hover Animation -->
                <div class="col-sm-3 m-10">
                    <div class="card">
                        <img src="{{asset('images/neworders.png')}}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                            <h5 class="card-title">New Orders</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary bg-black">View</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3 m-10">
                    <div class="card">
                        <img src="{{asset('images/neworders.png')}}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 m-10">
                    <div class="card">
                        <img src="{{asset('images/neworders.png')}}" class="card-img-top" alt="Card Image">
                        <div class="card-body">
                            <h5 class="card-title">Completed Orders</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>

        </div>      
            
    </Section>
</x-layout>


