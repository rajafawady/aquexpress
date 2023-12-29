<x-layout active='home'>

    @auth
        <div class="text-left p-3">
        <h4 class="text-dark font-weight-bold" >Hello, {{auth()->guard('supplier')->user()->companyName}}</h4>
        </div>
    @endauth

    <Section>
        <div class="container mt-4 p-5">

            <div class="row justify-content-around">
                <!-- Bootstrap Card with Shadow and Hover Animation -->
                <div class="col-sm-3 m-10">
                    <div class="card">
                        <img src="{{asset('images/neworders.png')}}" class="card-img-top" alt="Card Image">
                        <div class="card-body text-center">
                            <h5 class="card-title">New Orders</h5>
                            <a href="/supplier/neworders" class="btn btn-primary bg-black">View</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-3 m-10">
                    <div class="card">
                        <img src="{{asset('images/neworders.png')}}" class="card-img-top" alt="Card Image">
                        <div class="card-body text-center">
                            <h5 class="card-title">Pending Orders</h5>
                            <a href="/supplier/pendingorders" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 m-10">
                    <div class="card">
                        <img src="{{asset('images/neworders.png')}}" class="card-img-top" alt="Card Image">
                        <div class="card-body text-center" >
                            <h5 class="card-title">Completed Orders</h5>
                            <a href="/supplier/completedorders" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>

        </div>      
            
    </Section>
</x-layout>


