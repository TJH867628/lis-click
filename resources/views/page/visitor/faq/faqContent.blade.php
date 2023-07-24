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