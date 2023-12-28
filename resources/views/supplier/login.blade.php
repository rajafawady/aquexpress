<link rel="stylesheet" href="{{asset('styles/register.css')}}">
<link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css')}}">


<x-layout>


    <section class="sign-in-section">
      <div class="sign-in bounce-in-right text-center" id="sign-in">
          <h2>Sign In</h2>
            <form method="POST" action="/supplier/authenticate">
              @csrf
              <label for="email">Email</label>
              <div class="input-icons">
                  <input class="input-field w-100" type="text" placeholder="xyz@domain.com" id="email" name="email">

                  @error('email')
                  <p class="text-danger text-lg mt-1">{{$message}}</p>
                  @enderror
              </div>
              <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="*******" name="password">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="far fa-eye" style="color: black" id="togglePassword" onclick="togglePasswordVisibility()"></i>
                            </span>
                        </div>
                         @error('password')
                        <p class="text-danger text-lg mt-1">{{$message}}</p>
                        @enderror
                    </div>
              <div class="center"> 
                <button class="btn" type="submit" name="sign-in">Sign In</button>
              </div>
                
            </form>

          <div class="container d-flex flex-column justify-content-between ">
              <div class="my-3 "> 
                  <h6>Don't Have an Account?</h6>
                  <a href="/supplier/register">Register Now</a>
              </div>
              <div>
                <a href="">Forgot Your Password?</a> 
              </div>
              
          </div>
    
            <p class="hr-lines">OR</p>

            <div class="sign-with-acc text-center">
              <button id="sign-with-acc" class="btn flex align-center"><img width="25px" src="{{asset('/images/google.png')}}" alt="">Sign In With Google</button>
            </div>
        </div>
      </section>
      <script>
                function togglePasswordVisibility() {
                    var passwordInput = document.getElementById("password");
                    var toggleIcon = document.getElementById("togglePassword");

                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        toggleIcon.classList.remove("far", "fa-eye");
                        toggleIcon.classList.add("fas", "fa-eye-slash");
                    } else {
                        passwordInput.type = "password";
                        toggleIcon.classList.remove("fas", "fa-eye-slash");
                        toggleIcon.classList.add("far", "fa-eye");
                    }
                }
</script>

</x-layout>