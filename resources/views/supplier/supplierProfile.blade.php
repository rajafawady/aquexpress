<x-layout active="supplierProfile">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-white" style="background-color: #352f44;">
                <h2>Supplier Profile</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img id="profileImage" src="https://placekitten.com/200/200" alt="User Avatar" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-8">
                        <h3 id="companyName">Xyz Company</h3>
                        <p>Email: <span id="profileEmail">john.doe@example.com</span></p>
                        <p>Phone: <span id="profilePhone">123-456-7890</span></p>
                        <p>Address: <span id="profileLocation">City, Country</span></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn text-white" style="background-color: #352f44;" data-toggle="modal" data-target="#editModal">Edit Profile</button>
                <button class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal">Delete Account</button>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #352f44;">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Edit profile form goes here -->
                    <form id="profileEditForm">
                        <div class="form-group d-flex flex-column">
                            <label for="editName">Update Profile Photo:</label>
                            <input type="file" id="imageInput" class="mt-2" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="editCompanyName">Company Name:</label>
                            <input type="text" class="form-control" id="editCompanyName" value="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Email:</label>
                            <input type="email" class="form-control" id="editEmail" value="john.doe@example.com">
                        </div>
                        <div class="form-group">
                            <label for="editPhone">Phone:</label>
                            <input type="tel" class="form-control" id="editPhone" value="123-456-7890">
                        </div>
                      
                        <div class="form-group">
                            <label for="editAddress">Address:</label>
                            <textarea class="form-control" id="editAddress" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editPassword">New Password:</label>
                            <input type="password" class="form-control" id="editPassword">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                        <button type="button" style="background-color: #352f44;" class="btn text-white  ">Save Changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete Account</button>
                </div>
            </div>
        </div>
    </div>

</x-layout>