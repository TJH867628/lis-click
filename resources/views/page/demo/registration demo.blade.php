<!DOCTYPE html>
<html>
    <head>
        <title>User Registration | LIS1.0</title>
        <link rel="stylesheet" href="C:\laragon\www\liga\resources\css\registration.css">
        <style>
            .form-center{
                display: flex;
                justify-content: center;
                width: 300px;
                margin: auto;  
            }
        </style>
    </head>
    <body>
    <div>
        <div class="form-center">
            <h1>User Register</h1>
        </div>
        <div class="form-center">
            <form  action="registration" method="post" style>
                @csrf
                <label for="email" class="">Email</label><br>
                <input type="text" name="email" id="email" class="register" placeholder="Email Address" required><br>

                <label for="name" class="register">Full Name</label><br>
                <input type="text" name="name" id="name" class="register" placeholder="Name" required><br>

                <label for="IC_No" class="register">Idenfication Number / Passport</label><br>
                <input type="text" name="IC_No" id="IC_No" class="register" placeholder="Enter Idenfication Number / Passport" required><br>

                <label for="phoneNumber" class="register">Phone Number</label><br>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number"><br>
                
                <label for="category">Participants Category</label><br>
                <select name="category" id="category">
                    <option value="presentAndPublication">Paper Presentation & Publication</option>
                    <option value="paperPresentation">Paper Presentation ONLY</option>
                    <option value="posterPersentation">Poster Presentation ONLY</option>
                    <option value="publication">Publication ONLY</option>
                    <option value="studentPresenter">Student Presenter</option>
                </select><br>
                <label for="title" class="register">Title</label><br>
                <input type="text" name="title" id="title" placeholder="Dr./Mr/Mrs"><br>
                
                <label for="country">Country</label><br>
                <select name="country" id="country">
                    <option value="Malaysia">Malaysia</option>
                    <option value="Indonesia">Indonesia</option>
                </select><br>

                <label for="address" class="register">Address</label><br>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Address"></textarea><br>

                <label for="postcode">Post Code</label><br>
                <input type="text" name="postcode" id="postcode" placeholder="Post Code"><br>

                <label for="state">State</label><br>
                <input type="text" name="state" id="state" placeholder="state"><br>

                <label for="password" class="register">Password</label><br>
                <input type="password" name="password" id="password" class="register" placeholder="Password" required><br><br>
                
                <button type="submit" class="register" name="signUp">Sign Up</button>
            </form>
        </div>
    </div>
    </body>
</html>