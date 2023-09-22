<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>My Profile</title>
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
            <!-- Header-->
            <header class="bg-light text text-dark py-5" id="sectionBlur">
                <div class="container px-5 py-5">
                    <div id="contact" class="contact-area section-padding">
                        <div class="container">										
                            <div class="section-title text-center mt-5">
                                <h1>My Profile</h1>
                                <p>Welcome to your Profile, the online home of yours.</p>
                            </div>
                            
                            <div class="row">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
                                        <i class="fa fa-home text-center mr-1"></i> 
                                        Account
                                    </a>
                                    <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
                                        <i class="fa fa-key text-center mr-1"></i> 
                                        Password
                                    </a>
                                </div>
                                <form method="post" action="/updateProfile">
                                @csrf
                                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                                        <h3 class="mb-4">Profile Settings</h3>
                                          <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Salutation :</label>
                                                    <input type="text" name="salutation" class="form-control" value="{{ $user -> salutation }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Full Name :</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $user -> name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Mykad :</label>
                                                    <input type="text" name="IC_No" class="form-control" value="{{ $user -> IC_No }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email Address :</label>
                                                    <input type="text" name="email" class="form-control" value="{{ $user -> email }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Contact Number :</label>
                                                    <input type="text" name="phoneNumber" class="form-control" value="{{ $user -> phoneNumber }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Organization Name :</label>
                                                    <input type="text" name="organizationName" class="form-control" value="{{ $user -> organizationName }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address :</label>
                                                    <textarea name="address" class="form-control" rows="4" >{{ $user -> organizationAddress }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Postcode :</label>
                                                    <input type="text" name="postcode" class="form-control" value="{{ $user -> postcode }}">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                      <label>Country :</label>
                                                      <select id="country" class="form-control" name="category" onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                        <option value="malaysia">Malaysia</option>
                                                        <option value="indonesia">Indonesia</option>
                                                        <option value="taiwan">Taiwan</option>
                                                        <option value="vietnam">Vietnam</option>
                                                        <option value="singapore">Singapore</option>
                                                    </select><br>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                      <label>State :</label>
                                                      <select id="state" class="form-control" name="category" onclick="removeChooseoption()">
                                                        <option selected disabled>Choose</option>
                                                    </select><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary">Update</button>
                                            <button class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>
                                         
                                    <!--- PASSWORD -->
                                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                        <h3 class="mb-4">Password Settings</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>Current Password :</label>
                                                      <input type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>New Password :</label>
                                                      <input type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                      <label>Confirm New Password :</label>
                                                      <input type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary">Update</button>
                                            <button class="btn btn-primary">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!--- END ROW -->
                        </div><!--- END CONTAINER -->	
                    </div>
                </div>
            </header>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
            });
            </script>   
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>