<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquExpress</title>
    <link rel="shortcut icon" href="images/icon/transparent_white.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" href="styles/completedorders.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .search-btn:hover{
            background-color: #352f44;
            color: white;

        }
         .card{
            transition: ease-in-out 1s;
        }
        .card:hover{
            transform: scale(1.1);
            box-shadow: 10px 10px 5px #9187aa;
        }
    </style>

</head>

<body>

    <!--Navbar Start-->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #352f44;">
            <a class="navbar-brand" href="#">
                <img src="images/logo/transparent_white.png" width="25%" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Sign In</a>
                    </li>
                    <li class="nav-item ">
    
                        <a class="register-anchor nav-link text-white" href="register.html">
                            Register Now
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!--Navbar End-->

<div class="completed-orders-section m-auto  p-sm-5 ">
    <h2 class="text-center">Completed Orders</h2>
    <div class="input-group w-25  m-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
        <button type="button" class="btn search-btn" >search</button>
    </div>
    <!-- Order Card -->
    <div class="listing-completed-order d-flex flex-row justify-content-center align-items-center flex-wrap m-5">

        <div class="card order-card m-3 ">
            <div class="card-body order-details">
                <p class="card-text"><strong>Order ID:</strong> #12346</p>
                <p class="card-text"><strong>Customer Name:</strong> Jane Smith</p>
                <p class="card-text"><strong>Address:</strong> 456 Oak Street, Townsville</p>
                <p class="card-text"><strong>Quantity:</strong> Half Tank</p>
                <p class="card-text"><strong>Delivery Time:</strong> 3:30 PM</p>
                <p class="card-text"><strong>Mode of Payment:</strong> PayPal</p>
                <p class="card-text"><strong>Total Bill:</strong> $30.00</p>
            </div>
            
        </div>


    </div>
</div>
<!-- end of completed orders -->

    

    </Section>

    <!--Footer Start-->
    <footer class="footer-distributed">

        <div class="footer-left">
            <div class="logo">
                <img width="100px" height="60px" src="images/logo/transparent_white.png" alt="logo">
            </div>
            <p class="footer-links">
                <a href="index.html" class="link-1">Home</a>
                <a href="index.html#features">Features</a>
                <a href="about.html">About Us</a>
                <a href="contact.html">ContactUs</a>
                <a href="index.html#faq">Faq</a>
                <a href="login.html">Sign In</a>
                <a href="register.html">Register Now</a>
            </p>
        </div>

        <div class="footer-center">

            <div class="footer-contact">
                <img src="images/placeholder.png" class="icon" alt="">
                <p><span>Razi Hostel Block 2,</span> Nust, H12 Islamabad</p>
            </div>

            <div class="footer-contact">
                <img src="images/telephone.png" class="icon" alt="">
                <p>+92-322-8872242</p>
            </div>

            <div class="footer-contact">
                <img src="images/email.png" class="icon" alt="">
                <p><a href="mailto:rajafawady@gmail.com">support@aquexpress.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                Our user-friendly platform offers hassle-free water delivery, designed for simplicity and efficiency.
                With personalized branding and a commitment to reliability, we're dedicated to taking responsibility for
                your water needs."
            </p>

            <div class="footer-icons">

                <a href="#"><img class="social-icon" src="images/linkedin.png" alt=""></a>
                <a href="#"><img class="social-icon" src="images/facebook.png" alt=""></a>
                <a href="#"><img class="social-icon" src="images/instagram.png" alt=""></a>

            </div>

        </div>

        <div class="footer-icons-mobile">

            <a href="#"><img class="social-icon" src="images/linkedin.png" alt=""></a>
            <a href="#"><img class="social-icon" src="images/facebook.png" alt=""></a>
            <a href="#"><img class="social-icon" src="images/instagram.png" alt=""></a>

        </div>
        <div class="center copyrights">
            <p class="footer-company-name white">AquExpress &copy; 2023</p>
        </div>
    </footer>
    <!--footer ends-->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>

</html>


<!--<a href="https://www.flaticon.com/free-icons/quick" title="quick icons">Quick icons created by Freepik - Flaticon</a>    -->