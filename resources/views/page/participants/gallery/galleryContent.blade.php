<html>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            #ImgContainer{
                border: 1px solid white;    
                width: max-content;
                margin: auto;
                padding: 10px;
            }
        </style>
    </head>
    <body style="text-align: center;">
    <br><br><br><br><br><br><br>
        @if($gallery->isNotEmpty())
            @foreach($gallery as $gallery)
                @if($gallery->visible == true)
                <h1 style="color: white;">Gallery</h1>
                    <div id="ImgContainer">
                        <img src="{{ $gallery->imageSrc }}">
                        <h3>{{ $gallery->title }}</h3>
                        <p>{{ $gallery->description }}</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                @endif
            @endforeach
        @else
            <h1 style="color: white; margin-top:20%;">Gallery Is Empty </h1>
        @endif
    </body>
</html>