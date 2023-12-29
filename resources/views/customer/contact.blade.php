<link rel="stylesheet" href="{{asset('styles/style.css')}}">
<link rel="stylesheet" href="{{asset('styles/contact.css')}}">

  <x-customer-layout active='contact-us'>

    <section>
      
        <div class="contact-container">
          <div class="contact-details bounce-in-left text-center">
            <h2 class="text-white text-center">Contact Us</h2>
                <div class="contact-child">
                   <div class="icon-container">
                     <img src="images/placeholder.png"  class="icon" alt="pin">
                        <h4 class="center">Address</h4> 
                   </div>
                   <p>Razi Hostel, Block 2, Nust H12, Islamabad</p>
                </div>
                <div class="contact-child">
                    <div class="icon-container">
                      <img src="images/telephone.png"  class="icon" alt="">
                        <h4 class="center">Phone</h4> 
                    </div>
                    
                    <p>+92-322-8872242</p>
                  </div>
                  <div class="contact-child">
                    <div class="icon-container">
                      <img src="images/email.png"  class="icon" alt="">
                      <h4 class="center">Email</h4> 
                    </div>
                    
                   <p>support@aquexpress.com</p>
                  </div>
            </div>

            <div class="contact-form bounce-in-right">
                <h2 class="text-white text-center">Send Us a Message</h2>
                <form>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required value="{{old('name')}}">
    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required value="{{old('email')}}">
    
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required value="{{old('message')}}"></textarea>
    
                    <button class="btn text-white mt-3" type="submit">Send</button>
                  </form>
            </div>
        </div>
      </section>
  

    </x-customer-layout>