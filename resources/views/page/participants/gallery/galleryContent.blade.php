<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gallery</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
        body {
            background-color: #f7f7f7;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            padding: 10px;
            color: black;
            font-weight: bold;
        }

        #ImgContainer {
            max-width: 50%;
            margin: auto;
            padding: 50px;
            background-color: #0000001f;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 50px;
            margin-bottom: 20px;
        }

        img {
            max-width: 70%;
            max-height: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        h3 {
            color: #000000;
            margin-bottom: 5px;
        }

        p {
            color: #000000;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        /* Add some colors to buttons */
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Center the "Gallery Is Empty" message */
        .empty-message {
            color: #000000;
            margin-top: 20%;
        }

        .galleryContainer{
            margin-bottom: 10%;
        }

        #title{
            font-weight: bold;            
            margin-top: 20px;
            text-align: left;
            font-size: 30px;
            border-bottom: 3px solid #000000;
        }

        #description{
            margin-top: 20px;
            font-size: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
        }
    </style>
    </head>
    <body style="text-align: center;">
    <div class="galleryContainer">
        @if($gallery->isNotEmpty())
                <h1>Gallery</h1>
            @foreach($gallery as $gallery)
                @if($gallery->visible == true)
                <div id="ImgContainer">
                    <img src="{{ $gallery->imageSrc }}">
                    <h3 id="title">{{ $gallery->title }}</h3>
                    <p id="description">{{ $gallery->description }}</p>
                </div>
                @endif
            @endforeach
        @else
            <h1 style="color: white; margin-top:20%;">Gallery Is Empty </h1>
        @endif
    </div>
       
    </body>
</html>