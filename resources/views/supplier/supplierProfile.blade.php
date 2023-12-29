<x-layout active="profile">

    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #352f44;">
                <h2>User Profile</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img id="profileImage" src="{{isset($user->picture)?asset('/storage/'.$user->picture) : "https://placekitten.com/200/200"}}" width="70%" alt="User Avatar" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-8">
                        <h3 id="profileName">{{$user->companyName}}</h3>
                        <p>Email: <span id="profileEmail">{{$user->email}}</span></p>
                        <p>Phone: <span id="profilePhone">{{$user->phone}}</span></p>
                        <p>Address: <span id="profileLocation">{{$user->address}}</span></p>
                    </div>
                </div>
            </div>
            <div class="card-footer row justify-content-between">
                <a href="/supplier/profile/edit" class="btn text-white" style="background-color: #352f44;">Edit Profile</a>
                <form action="/supplier/profile/delete" method="POST" id="deleteForm">
                    @csrf
                    <button class="btn btn-danger" id="deleteButton">Delete Account</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('deleteButton').addEventListener('click', function (e) {
            e.preventDefault();
            
            var confirmation = confirm('Are you sure you want to delete your account?');
    
            if (confirmation) {
                // If the user clicks "OK," submit the form
                document.getElementById('deleteForm').submit();
            }
        });
    </script>
    
</x-customer-layout>


