<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquExpress</title>
    <link rel="shortcut icon" href="images/icon/transparent_white.ico" type="image/x-icon">
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    

</head>

<body>

    <!--Navbar Start-->
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #352f44;">
          <div class="container-fluid">
              <a class="navbar-brand w-25" href="#">
                  <img src="{{asset("/images/logo/transparent_white.png")}}" width="25%" alt="logo">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                      <li class="nav-item active">
                          <a class="nav-link" href="index.html">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="index.html#features">Features</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="about.html">About Us</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="contact.html">Contact Us</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="index.html#faq">FAQs</a>
                      </li>
                      
                      
                      @auth
                      <li class="text-light">Hello, {{auth()->user()->companyName ? auth()->user()->companyName:""}}</li>
                      @else
                      <li class="nav-item">
                        <a class="nav-link" href="/login">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="register-anchor nav-link text-white" href="/register">
                                Register Now
                            </a>
                        </li>
                      @endauth
                  </ul>
              </div>
          </div>
      </nav>
  </header>
    <!--Navbar End-->
    <main>

    {{$slot}}

    </main>

  {{--}}Footer Starts{{--}}

  <footer class="footer-distributed" style="background-color: #352f44;">

    <div class="container pt-5">

        <div class="row align-items-center">
            <!-- Footer Left -->
            <div class="col-sm-4 mb-4 mb-sm-0 w-sm-100">
                <div class="logo text-center">
                    <img width="20%" src="{{asset('/images/logo/transparent_white.png')}}" alt="logo">
                </div>
                <div class="footer-links d-flex flex-wrap justify-content-center">
                    <a href="index.html" class="text-white mx-2">Home </a>
                    <a href="index.html#features" class="text-white mx-2">Features </a>
                    <a href="about.html" class="text-white mx-2">About Us </a>
                    <a href="contact.html" class="text-white mx-2">Contact Us </a>
                    <a href="index.html#faq" class="text-white mx-2">FAQ </a>
                    <a href="login.html" class="text-white mx-2">Sign In </a>
                    <a href="register.html" class="text-white mx-2">Register Now </a>
                </div>
            </div>


            <!-- Footer Center -->
            <div class="col-sm-4 text-center mb-4 mb-sm-0">
                <p class="footer-company-about text-white">
                    <span style="font-size: larger;"><strong>About the company</strong></span><br>
                    Our user-friendly platform offers hassle-free water delivery, designed for simplicity and
                    efficiency.
                    With personalized branding and a commitment to reliability, we're dedicated to taking responsibility
                    for
                    your water needs.
                </p>

               
            </div>

            <!-- Footer Right -->
            <div class="col-sm-4 m-auto text-center">
                <div class="d-flex w-sm-50 align-items-center justify-content-start text-white mb-3">
                    <img src="{{asset('/images/placeholder.png')}}" width="12%" class="icon" alt="">
                    <p><span>Razi Hostel Block 2,</span> Nust, H12 Islamabad</p>
                </div>
            
                <div class="d-flex w-sm-50 align-items-center justify-content-start text-white mb-3">
                    <img src="{{asset('/images/telephone.png')}}" width="12%" class="icon" alt="">
                    <p>+92-322-8872242</p>
                </div>
            
                <div class="d-flex w-sm-50 align-items-center justify-content-start text-white mb-3">
                    <img src="{{asset('/images/email.png')}}" width="12%" class="icon" alt="">
                    <p><a href="mailto:rajafawady@gmail.com" class="text-white">support@aquexpress.com</a></p>
                </div>

            </div>
        </div>



        <!-- Copyrights -->
        <div class="row m-2">
            
            <div class="col-12 text-center">
                <div class="footer-icons d-flex justify-content-center">
                    <a href="#"><img class="social-icon w-75" src="{{asset('/images/linkedin.png')}}" alt=""></a>
                    <a href="#"><img class="social-icon w-75" src="{{asset('/images/facebook.png')}}" alt=""></a>
                    <a href="#"><img class="social-icon w-75" src="{{asset('/images/instagram.png')}}" alt=""></a>
                </div>
                <p class="footer-company-name text-white">AquExpress &copy; 2023</p>
            </div>
        </div>
    </div>

</footer>

  <x-flash-message />

  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
