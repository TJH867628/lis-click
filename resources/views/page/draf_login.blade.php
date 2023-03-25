<html>
    <head>
        <title>Login Page</title>
        <style>
             .center{
                display: flex;
                justify-content: center;
                margin: auto;
             }
        </style>
    </head>
    <body>
        <div class="center">
            <h1>LIS Login</h1>
        </div>
        <div class="center">
            <form action="login" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="login" placeholder="example : xxx@xxxxx.com" value="{{ old ('email') }}"><br>
                <span class="text-danger" style="color: red;">@error('email'){{ $message }} @enderror</span><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="login" placeholder="password"><br>
                <span class="text-danger" style="color: red;">@error('password'){{ $message }} @enderror</span><br>
                @if(Session::get('fail'))
                    <div class="alert alert-danger" style="color:red">
                        {{ Session::get('fail') }}
                @endif
                <button type="submit" class="center" name="login">Login</button>
                
            </form>
        </div>
    </body>
</html>