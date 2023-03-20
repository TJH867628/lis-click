<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <div class="card-header">
            <h1>LIS Login</h1>
        </div>
        <div class="card-body">
            <form action="login" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="login" placeholder="example : xxx@xxxxx.com"><br>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="login" placeholder="password"><br>
                
                <button type="submit" class="login" name="login">Login</button>
            </form>
        </div>
    </body>
</html>