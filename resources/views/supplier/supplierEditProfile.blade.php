<x-layout >

    <!-- Edit Profile  -->
                <div class="container my-4">
                    <!-- Edit profile form goes here -->
                    <form id="profileEditForm" action="/supplier/profile/edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-flex flex-column">
                            <label for="editName">Update Profile Photo:</label>
                            <div class="col-md-4">
                                <img id="profileImage" src="{{isset($user->picture)?asset('/storage/'.$user->picture) : "https://placekitten.com/200/200"}}" width="150px" alt="User Avatar" class="img-fluid rounded-circle">
                            </div>

                            <input type="file" id="picture" class="mt-2" accept="image/*" value="{{$user->picture}}" name="picture">
                            
                            @error('picture')
                                <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="editName">Name:</label>
                            <input type="text" class="form-control" id="companyName" name="companyName" value="{{$user->companyName}}">
                            @error('companyName')
                                <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Email:</label>
                            <input type="email" class="form-control" id="editEmail" name="email" value="{{$user->email}}">
                            @error('email')
                                <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="editPhone">Phone:</label>
                            <input type="tel" class="form-control" name="phone" id="editPhone" value="{{$user->phone}}">
                            @error('phone')
                                <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="editAddress">Address:</label>
                            <input type="hidden" class="form-control mb-3" id="address" name="address" value="{{$user->address}}">
                            <x-googlemap :address="$user->address"/>
                                @error('address')
                                <p class="text-danger text-lg mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" style="background-color: #352f44;" class="btn text-white ">Update Profile</button>
                    </form>
                </div>
    
    
    </x-customer-layout>