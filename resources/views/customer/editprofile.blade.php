<x-customer-layout >

<!-- Edit Profile  -->
            <div class="container">
                <!-- Edit profile form goes here -->
                <form id="profileEditForm" >
                    <div class="form-group d-flex flex-column">
                        <label for="editName">Update Profile Photo:</label>
                        <input type="file" id="imageInput" class="mt-2" accept="image/*" name="profilePhoto" value="{{old('profilePhoto')}}">
                    </div>
                    <div class="form-group">
                        <label for="editName">Name:</label>
                        <input type="text" class="form-control" id="editName" value="John Doe" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="email" class="form-control" id="editEmail" value="john.doe@example.com" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="editPhone">Phone:</label>
                        <input type="tel" class="form-control" id="editPhone" value="123-456-7890" name="phone" value="{{old('phone')}}">
                    </div>
                  
                    <div class="form-group">
                        <label for="editAddress">Address:</label>
                        <textarea class="form-control" id="editAddress" rows="2" name="address" value="{{old('address')}}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editPassword">New Password:</label>
                        <input type="password" class="form-control" id="editPassword" name="password" value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>
                    <button type="button" style="background-color: #352f44;" class="btn text-white ">Save Changes</button>
                </form>
            </div>


</x-customer-layout>