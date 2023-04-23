<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact Us</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conference</a>
                            <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">      
                                    <li><a class="dropdown-item" href="/conferencesInfo">Conference Info</a></li>
                                    <li><a class="dropdown-item" href="/conferencesDownload">Downloads</a></li>
                                </ul>
                                <li class="nav-item"><a class="nav-link" href="/publicationInfo">Publication</a></li>
                                <li class="nav-item"><a class="nav-link" href="/faq">Contact Us</a></li>
                                
                            <a href="login.html" class="btn btn-primary">Hi , {{$userSession}}</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header-->
            <header class="bg-light text text-dark py-5">
                <div class="container px-5 py-5">
                    <div id="contact" class="contact-area section-padding">
                        <div class="container">										
                            <div class="section-title text-center">
                                <h1>Contact Us</h1>
                                <p>Let's Start a Conversation and Ask How We Can Help You</p>
                            </div>					
                            <div class="row">
                                <div class="col-lg-7">	
                                    <div class="contact">
                                        <form class="form" name="enq" method="post" action="contact.php" onsubmit="return validation();">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea rows="6" name="message" class="form-control" placeholder="Your Message" required="required"></textarea>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" value="Send message" name="submit" id="submitButton" class="btn btn-primary btn-contact-bg" title="Submit Your Message!">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!--- END COL --> 
                                <div class="col-lg-5">
                                    <div class="single_address">
                                        <i class="fa fa-map-marker"></i>
                                        <h4>Our Address</h4>
                                        <p>Jalan Nitar, 86800 Mersing Johor</p>
                                    </div>
                                    <div class="single_address">
                                        <i class="fa fa-envelope"></i>
                                        <h4>Send your message</h4>
                                        <p>lis2023@pmj.edu.my</p>
                                    </div>
                                    <div class="single_address">
                                        <i class="fa fa-phone"></i>
                                        <h4>Call us on</h4>
                                        <p>(+60) - 07798 0001</p>
                                    </div>
                                    <div class="single_address">
                                        <i class="fa fa-clock-o"></i>
                                        <h4>Work Time</h4>
                                        <p>Mon - Fri: 08.00 - 16.00. <br>Sat: 10.00 - 14.00</p>
                                    </div>					
                                </div><!--- END COL --> 
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                    </div>
                </div>
            </header>

        

            

            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">New Item, delivered to you.</div>
                                <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                            </div>
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                    <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                    <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                                </div>
                                <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        </main>

        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">© 2023 LIGA ILMU SERANTAU 2023. All Rights Reserved. Design by Politeknik Mersing</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="FeFaq.html">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>
