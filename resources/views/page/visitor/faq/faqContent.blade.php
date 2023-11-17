<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Contact Us</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />
        <script src="https://www.google.com/recaptcha/api.js"></script>
            <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
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
                                        <form class="form" id="faqForm" name="enq" method="post" action="{{ route('sendEmailContactUs') }}">
                                        @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="name" class="form-control" placeholder="Name" required="required" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" >
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea rows="6" name="message" class="form-control" placeholder="Your Message" required="required"></textarea>
                                                </div>
                                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                                                <div id="g-recaptcha-response"></div>
                                                <div id="recaptcha-feedback"></div>
                                                @if($message = Session::get('success'))
                                                <div class="alert alert-success" style="text-align: center;  font-size:large; font-weight:bold;">
                                                    <p style="color:black;">{{ $message }}</p>
                                                </div>
                                                @elseif($message = Session::get('error'))
                                                <div class="alert alert-danger" style="text-align: center;  font-size:large; font-weight:bold;">
                                                    <p style="color:black;">{{ $message }}</p>
                                                </div>
                                                @endif
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
                                        <p>{{$officialDetails->officialAddress->masterdata_value}}</p>
                                    </div>
                                    <div class="single_address">
                                        <i class="fa fa-envelope"></i>
                                        <h4>Send your message</h4>
                                        <p>{{$officialDetails->officialEmail->masterdata_value}}</p>
                                    </div>
                                    <div class="single_address">
                                        <i class="fa fa-phone"></i>
                                        <h4>Call us on</h4>
                                        <p>{{$officialDetails->officialContactNumber->masterdata_value}}</p>
                                    </div>
                                    <div class="single_address">
                                        <i class="fa fa-clock-o"></i>
                                        <h4>Work Time</h4>
                                        <p>{{$officialDetails->officialWorkingTime->masterdata_value}}</p>
                                    </div>					
                                </div><!--- END COL --> 
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                    </div>
                </div>
                <script>
                    document.getElementById('faqForm').addEventListener('submit', function (event) {

                        event.preventDefault();
                        var recaptchaResponse = grecaptcha.getResponse();
                        console.log(recaptchaResponse);
                        if (recaptchaResponse.length === 0) {
                            event.preventDefault(); // Prevent form submission
                            document.getElementById('recaptcha-feedback').innerHTML = 'Please complete the reCAPTCHA.';
                        } else {
                            // reCAPTCHA was completed, continue with form submission
                            document.getElementById('recaptcha-feedback').innerHTML = ''; // Clear any previous error message
                            var form = document.getElementById('faqForm');
                            const submitFormFunction = Object.getPrototypeOf(form).submit;
                            submitFormFunction.call(form);
                        }
                    });
                </script>
            </header>
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>
