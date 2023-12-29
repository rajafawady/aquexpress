<link rel="stylesheet" href="{{asset('styles/register.css')}}">




<x-layout>

    <section class="sign-in-section">
        <div class="sign-up bounce-in-left" id="sign-up">
            <h2 class="text-center">Sign Up</h2>
            <form method="POST" action="/supplier/registration">
                @csrf
                <!-- Company Name -->
                <div class="form-group">
                    <label for="companyName">Enter Company Name</label>
                    <input type="text" class="form-control" id="companyName" placeholder="Company Name"
                        name="companyName">
                        @error('companyName')
                  <p class="text-danger text-lg mt-1">{{$message}}</p>
                  @enderror
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone">Phone No.</label>
                    <input type="text" class="form-control" placeholder="+923XXXXXXXXX" id="phone" name="phone">
                    @error('phone')
                  <p class="text-danger text-lg mt-1">{{$message}}</p>
                  @enderror
                </div>
                <!-- Email  -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" placeholder="xyz@domain.com" id="email" name="email">
                    @error('email')
                  <p class="text-danger text-lg mt-1">{{$message}}</p>
                  @enderror
                </div>

                

                <!-- CNIC Pictures 
                <div class="form-group">
                    <label for="cnicFront">CNIC Picture (Front)</label>
                    <input type="file" class="form-control-file" id="cnicFront" name="cnicFront">
                </div>

                <div class="form-group">
                    <label for="cnicBack">CNIC Picture (Back)</label>
                    <input type="file" class="form-control-file" id="cnicBack" name="cnicBack">
                </div> -->

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" rows="3" placeholder="Enter Address"
                        name="address"></textarea>
                    @error('address')
                  <p class="text-danger text-lg mt-1">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="*******" name="password">

                        <div class="input-group-append pointer" onclick="togglePasswordVisibility('password')">
                            <span class="input-group-text">
                                <i class="far fa-eye" id="togglepassword"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                  <p class="text-danger text-lg mt-1">{{$message}}</p>
                  @enderror
                  </div>


                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="*******"
                        name="password_confirmation">

                        <div class="input-group-append pointer" onclick="togglePasswordVisibility('confirmPassword')">
                            <span class="input-group-text">
                                <i class="far fa-eye" style="color: black" id="toggleconfirmPassword"></i>
                            </span>
                        </div>

                    </div>
                    @error('password_confirmation')
                  <p class="text-danger text-lg mt-1">{{$message}}</p>
                  @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>

            <div class="d-flex flex-column justify-content-center align-item-center">
                <div class="p-2 d-flex flex-column text-center">
                    <h6>Already Have an Account?</h6>
                    <p><a href="/supplier/login">Sign In</a></p>
                </div>
            </div>
            
            <p class="hr-lines">OR</p>
            
            <div class="d-flex justify-content-center ">
                <button id="sign-with-acc" class="btn flex align-center"><img width="25px" src="{{asset('/images/google.png')}}" alt="">Sign Up
                    With Google</button>
            </div>

        </div>
    </section>
    <script>
    function togglePasswordVisibility(fieldId) {
        var passwordInput = document.getElementById(fieldId);
        var toggleIcon = document.getElementById('toggle' + fieldId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('far', 'fa-eye');
            toggleIcon.classList.add('fas', 'fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fas', 'fa-eye-slash');
            toggleIcon.classList.add('far', 'fa-eye');
        }
    }
</script>
</x-layout>