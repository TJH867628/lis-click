<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LIS Registration</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script>
        function removeChooseoption(val){
        var element=document.getElementById('category');
        if(val=='others')
        element.style.display='block';
        else  
        element.style.display='none';
        }
        </script>
        <style>
          .error{
            border: 1px solid red;
            border-radius: 20px;
            background-color: red;
            text-align: center;
            margin-bottom: 10px;
            color: white;
          }

          .success{
            border: 1px solid lightblue;
            border-radius: 20px;
            background-color: lightblue;
            text-align: center;
            margin-bottom: 10px;
          }
    </style>
    </head>
    <body>
        <!-- Your HTML code goes here -->
    </body>
</html>

    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container px-5">
                    <a class="navbar-brand" href="/">
                        <img src="images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                       <li class="nav-item"><a class="nav-link" href="/faq">Contact Us</a></li>
                       <li class="nav-item"><a class="nav-link" href="/registration">Register</a></li>
                                </ul>
                            </div>
                            <a href="/login" class="btn btn-primary">Login</a>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header-->
            <header class="bg-light text text-dark py-5">
                <div class="container px-5 py-5 mt-xl-5">
                    <div id="contact" class="contact-area section-padding">
                        <div class="container py-5">										
                            <div class="section-title text-center fw-bold">
                                <h1>REGISTER</h1>
                                
                            </div>
                            <form method="post">
                             @csrf
                             <div class="row-register">
                                <div class="col-lg-7">	
                                    <div class="contact">
                                        <form class="form" name="enq" method="post" action="/registration" onsubmit="return validation();">
                                            <div class="row">
                                                
                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Salutation :</label>
                                                    <select class="dropdown-option" id="salutation" name="salutation">
                                                        <option selected disabled>Choose</option>
                                                        <option value="Dr">Dr</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Dato">Dato</option>
                                                        <option value="Datin">Datin</option>
                                                        <option value="Encik">Encik</option>
                                                        <option value="Prof">Prof</option>
                                                        <option value="Dr prof">Dr Prof</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                <input type="text" name="salutationInput" id="salutationInput" style='display:none;'/><br>
                                                </div>
                                                <!--End Dropdown-->
                                                <!--Dropdown-->
                                                <div class="form-group col-md-7">
                                                    <label class="category">Participant Category :</label>
                                                    <select class="dropdown-option category" name="category"  onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="presenter">Presenter</option>
                                                        <option value="presenter">Audience</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                <div class="form-group col-md-12">
                                                    <input type="text" name="name" id="name" class="form-control name" placeholder="Full Name" required="required">
                                                </div>

                                                 <div class="form-group col-md-7">
                                                    <input type="text" name="organizationName" id="organizationName"  class="form-control organizationName" placeholder="Organization Name" required="required">
                                                </div>
                                                <div class="form-group col-md-5">
                                                    <input type="text" name="email" id="email" class="form-control email" placeholder="Email Address" required="required">
                                                    @if($message = Session::get('error'))
                                                    <div class="error">
                                                        <span class="error">{{ $message }}</span><br> 
                                                    </div>
                                                    @endif
                                                </div> 

                                                <div class="form-group col-md-6">
                                                    <input type="text" name="IC_No" id="IC_No" class="form-control IC_No" placeholder="IC Number " required="required">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control phoneNumber" placeholder="Phone Number" required="required">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea rows="6" name="address" id="address" class="form-control address" placeholder="Address" required="required"></textarea>
                                                </div>
                                                <div class="form-group col-md-4 pe-5">
                                                    <input type="text" name="postcode" id="postcode" class="form-control postcode" placeholder="Postcode" required="required">
                                                </div>
                                                
                                                <!--Dropdown-->
                                                <div class="form-group col-md-3">
                                                    <label class="category">Country :</label>
                                                    <select id="country" class="dropdown-option country" name="country"  onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="malaysia">Malaysia</option>
                                                        <option value="indonesia">Indonesia</option>
                                                        <option value="taiwan">Taiwan</option>
                                                        <option value="vietnam">Vietnam</option>
                                                        <option value="singapore">Singapore</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                <!--Dropdown-->
                                                <div class="form-group col-md-4">
                                                    <label for="state">State :</label>
                                                    <select id="state" class="dropdown-option state" name="state"  onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="">-- Select State --</option>
                                                    </select><br>
                                                </div>
                                                <!--End Dropdown-->
                                                <div class="form-group col-md-4 pe-5" >
                                                    <input type="password" name="password" id="password" class="form-control password" placeholder="password" required="required">
                                                </div>
                                                
                                                
                                                
                                              

                                        <script>
                                        $(document).ready(function() {
                                        // Define an object that maps countries to states
                                        var stateOptions = {
                                        malaysia: ["Johor", "Kedah", "Kelantan", "Melaka", "Negeri Sembilan", "Pahang", "Perak", "Perlis", "Penang", "Sabah", "Sarawak", "Selangor", "Terengganu"],
                                        indonesia: ["Aceh", "Bali", "Bangka Belitung", "Banten", "Bengkulu", "Gorontalo", "Jakarta", "Jambi", "Jawa Barat", "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan", "Kalimantan Tengah", "Kalimantan Timur", "Kepulauan Riau", "Lampung", "Maluku", "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Papua", "Papua Barat", "Riau", "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tengah", "Sulawesi Tenggara", "Sulawesi Utara", "Sumatera Barat", "Sumatera Selatan", "Sumatera Utara", "Yogyakarta"],
                                        taiwan: ["Changhua", "Chiayi", "Hsinchu", "Hualien", "Kaohsiung", "Keelung", "Miaoli", "Nantou", "Penghu", "Pingtung", "Taichung", "Tainan", "Taipei", "Taitung", "Taoyuan", "Yilan", "Yunlin"],
                                        singapore: ["Central Region", "East Region", "North Region", "North-East Region", "West Region"],
                                        vietnam: ["Ho Chi Minh City", "Hanoi", "Can Tho", "Da Nang", "Hai Phong", "Ba Ria-Vung Tau", "Bac Giang", "Bac Kan", "Bac Lieu", "Bac Ninh", "Ben Tre", "Binh Dinh", "Binh Duong", "Binh Phuoc", "Binh Thuan", "Ca Mau", "Cao Bang", "Dak Lak", "Dak Nong", "Dien Bien", "Dong Nai", "Dong Thap", "Gia Lai", "Ha Giang", "Ha Nam", "Ha Tinh", "Hai Duong", "Hau Giang", "Hoa Binh", "Hung Yen", "Khanh Hoa", "Kien Giang", "Kon Tum", "Lai Chau", "Lam Dong", "Lang Son", "Lao Cai", "Long An", "Nam Dinh", "Nghe An", "Ninh Binh", "Ninh Thuan", "Phu Tho", "Quang Binh", "Quang Nam", "Quang Ngai", "Quang Ninh", "Quang Tri", "Soc Trang", "Son La", "Tay Ninh", "Thai Binh", "Thai Nguyen", "Thanh Hoa", "Thua Thien-Hue", "Tien Giang", "Tra Vinh", "Yen Bai"]
                                        };


                                        
                                        // When a country is selected, update the options in the state dropdown
                                        $('#country').change(function() {
                                            var selectedCountry = $(this).val();
                                            var stateOptionsHtml = '<option value="">-- Select State --</option>';
                                            if (selectedCountry && stateOptions[selectedCountry]) {
                                            var states = stateOptions[selectedCountry];
                                            for (var i = 0; i < states.length; i++) {
                                                stateOptionsHtml += '<option value="' + states[i] + '">' + states[i] + '</option>';
                                            }
                                            }
                                            $('#state').html(stateOptionsHtml);
                                        });

                                        $('#salutation').change(function(){
                                            var selectedSalutation = $(this).val();
                                            if (selectedSalutation === "Others") {
                                                $('#salutationInput').show();
                                            }
                                        })
                                    });
                                        </script>                                          
                                                
                                                <div class="col-md-12 text-center">
                                                    <a href="FeLISregister_2.html"><button type="submit" value="Send form" name="submit" id="submitButton" class="button-submit" title="Submit your form!">Submit</button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                            </form>		
                            
                    </div>
                </div>
            </header>

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
                        <a class="link-light small" href="#!">Contact</a>
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