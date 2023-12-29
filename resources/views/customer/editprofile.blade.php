<x-customer-layout >

<!-- Edit Profile  -->
            <div class="container my-4">
                <!-- Edit profile form goes here -->
                <form id="profileEditForm" action="/profile/edit" method="POST">
                    @csrf
                    <div class="form-group d-flex flex-column">
                        <label for="editName">Update Profile Photo:</label>
                        <input type="file" id="imageInput" class="mt-2" accept="image/*" name="picture" value="{{$user->picture}}">
                        @error('picture')
                            <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="editName">Name:</label>
                        <input type="text" class="form-control" id="editName" name="name" value="{{$user->name}}">
                        @error('name')
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