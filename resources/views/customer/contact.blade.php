
<link rel="stylesheet" href="{{asset('styles/contact.css')}}">

  <x-customer-layout active='contact-us'>

    <section>
      
        <div class="contact-container">
          <div class="contact-details bounce-in-left text-center">
            <h2 class="text-white text-center mb-5">Contact Us</h2>

                <div class="contact-child mt-2">
                   <div class="icon-container">
                     <img src="images/placeholder.png"  class="icon" alt="pin">
                        <h5 class="text-center">Address</h5> 
                   </div>
                   <p>Razi Hostel, Block 2, Nust H12, Islamabad</p>
                </div>
                <div class="contact-child my-2">
                    <div class="icon-container">
                      <img src="images/telephone.png"  class="icon" alt="">
                        <h5 class="center">Phone</h5> 
                    </div>
                    
                    <p>+92-322-8872242</p>
                  </div>
                  <div class="contact-child">
                    <div class="icon-container">
                      <img src="images/email.png"  class="icon" alt="">
                      <h5 class="center">Email</h5> 
                    </div>
                    
                   <p>support@aquexpress.com</p>
                  </div>
            </div>

            <div class="contact-form bounce-in-right">
                <h2 class="text-white text-center">Send Us a Message</h2>
                <form method="POST" action="/contact">
                  @csrf
                    <label for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" required value="{{old('name')}}">
    
                    <label for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" required value="{{old('email')}}">
    
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required value="{{old('message')}}"></textarea>
    
                    <button class="submit-button btn text-white mt-3" type="submit">Send</button>
                  </form>
            </div>
        </div>
      </section>
  

    </x-customer-layout>