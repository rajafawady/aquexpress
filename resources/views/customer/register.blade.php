<link rel="stylesheet" href="{{asset('styles/register.css')}}">
<x-customer-layout>
  <section>
    <div class="sign-up bounce-in-left" id="sign-up">
      <h2>Sign Up</h2>
          <form >
            <label for="name">Enter Name</label>
              <div class="input-icons">
                  <input class="input-field" 
                  type="text"
                         placeholder="Name" name="name" id="name">
                        </div>
                        <label for="phone">Phone No.</label>
                        <div class="input-icons">
                  <input class="input-field" type="text" placeholder="+923XXXXXXXXX" id="phone" name="phone">
              </div>
              <label for="password">Password</label>
              <div class="input-icons">
                  <input class="input-field" 
                         type="password"
                         placeholder="*******" name="password" id="password">
                        </div>
                        <div class="center">
                          <button class="btn" type="submit" name="submit">Sign Up</button>
                        </div>
              
          </form>
          <div class="flex align-center">
            <h4>Already Have an Account?</h4>
            <a href="login.html">Sign In</a>
          </div>

          <p class="hr-lines">OR</p>
          
          <div class="sign-with-acc center">
            <button id="sign-with-acc" class="btn flex align-center"><img width="25px" src="images/google.png" alt="">Sign Up With Gmail</button>
          </div>
      </div>
    </section>

    
  </x-customer-layout>