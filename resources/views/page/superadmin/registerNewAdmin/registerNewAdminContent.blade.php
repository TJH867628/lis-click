<form  action="registerAdmin" method="post" style>
                @csrf
                <label for="role" class="role">Role</label><br>
                <select name="role" id="role">
                    @foreach($adminRole as $role)
                        <option value="{{$role->roletype}}">{{$role->roletype}}</option>
                    @endforeach
                </select>

                <br><label for="email" class="">Email</label><br>
                <input type="text" name="email" id="email" class="register" placeholder="Email Address" required><br>
                @if($message = Session::get('error'))
                    <span class="error">{{ $message }}</span><br>
                @endif

                <label for="name" class="register">Full Name</label><br>
                <input type="text" name="name" id="name" class="register" placeholder="Name" required><br>

                <label for="IC_No" class="register">IC Number</label><br>
                <input type="text" name="IC_No" id="IC_No" class="register" placeholder="Enter IC Number" required><br>

                <label for="phoneNumber" class="register">Phone Number</label><br>
                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number"><br>
            
                <label for="title" class="register">Salutation</label><br>
                <input type="text" name="salutation" id="salutation" placeholder="Dr./Mr/Mrs"><br>
                
                <label for="title" class="register">Organization Name</label><br>
                <input type="text" name="organizationName" id="organizationName" placeholder="Organization Name"><br>

                <label for="password" class="register">Password</label><br>
                <input type="password" name="password" id="password" class="register" placeholder="Password" required><br><br>
                
                <button type="submit" class="register" name="signUp">Sign Up</button>
            </form>