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
        <link href="../css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body{
                background-color: #eaeaea;
                overflow: hidden;
            }
            #container{
                position: absolute;
                left:50%;
                top:52%;
                transform: translate(-50%,-50%);
                width:60%;
                height:70%;
                padding:50px;
                background-color: #f5f5f5;
                box-shadow: 0 30px 50px #dbdbdb;
            }
            #slide{
                width:max-content;
                margin-top:50px;
            }
            #item{
                width:100px;
                height:100px;
                background-position: 50% 50%;
                display: inline-block;
                transition: 0.5s;
                background-size: contain;
                background-size: 100% 100%;
                background-repeat: no-repeat;
                position: absolute;
                z-index: 1;
                top:50%;
                transform: translate(0,-50%);
                border-radius: 20px;
                box-shadow:  0 30px 50px #505050;
            }

            #item:nth-child(1),
            #item:nth-child(2){
                left:0;
                top:0;
                transform: translate(0,0);
                border-radius: 0;
                width:100%;
                height:100%;
                box-shadow: none;
            }
            #item:nth-child(3){
                left:82%;
            }
            #item:nth-child(4){
                left:calc(60% + 280px);
            }
            #item:nth-child(5){
                left:calc(60% + 340px);
            }
            #item:nth-child(n+6){
                left:calc(60% + 560px);
                opacity: 0;
            }
            #item #content{
                position: absolute;
                top:50%;
                left:100px;
                width:300px;
                background: transparent;
                border: 2px solid rgba(255, 255, 255, 0.5);
                border-radius: 20px;
                backdrop-filter: blur(20px);
                box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
                overflow: hidden;
                padding: 10px;;
                color:#eee;
                transform: translate(0,-50%);
                display: none;
                font-family: system-ui;
            }

            #item:nth-child(2) #content{
                display: block;
                z-index: 11111;
            }
            #item #name{
                color: white;
                font-size: 40px;
                font-weight: bold;
                opacity: 0;
                animation:showcontent 1s ease-in-out 1 forwards
            }
            #item #des{
                color: white;
                margin:20px 0;
                opacity: 0;
                animation:showcontent 1s ease-in-out 0.3s 1 forwards
            }
            #item #button{
                padding:10px 20px;
                border:none;
                opacity: 0;
                animation:showcontent 1s ease-in-out 0.6s 1 forwards
            }
            @keyframes showcontent{
                from{
                    opacity: 0;
                    transform: translate(0,100px);
                    filter:blur(33px);
                }to{
                    opacity: 1;
                    transform: translate(0,0);
                    filter:blur(0);
                }
            }
            #buttons{
                position: absolute;
                bottom:30px;
                z-index: 222222;
                text-align: center;
                width:100%;
            }
            #buttons button{
                width:50px;
                height:50px;
                border-radius: 50%;
                border:1px solid #555;
                transition: 0.5s;
            }#buttons button:hover{
                background-color: #bac383;
            }
            @media screen and (max-width: 1080px) {
                .mobile-show{
                    display: block;
                }

                .mobile-hide{
                    display: none;
                }

                #MobileButtons{
                    position: absolute;
                    bottom:30px;
                    z-index: 222222;
                    text-align: center;
                    width:100%;
                }

                #content{
                    width:300px;
                    background: transparent;
                    border: 2px solid rgba(255, 255, 255, 0.5);
                    border-radius: 20px;
                    backdrop-filter: blur(20px);
                    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
                    overflow: hidden;
                    padding: 10px;;
                    color:black;
                    transform: translate(0,-50%);
                    display: none;
                    font-family: system-ui;
                }

                #item{
                    width: 80%;
                    height: 30%;
                }
            }
    </style>
    </head>
    <body>
    @if($gallery->isNotEmpty())
    <div id="container">
        <div id="slide">
            @foreach($gallery as $galleryItem)
                @if($galleryItem->visible == true)
                    <div id="item" style="background-image: url({{ $galleryItem->imageSrc }});" class="mobile-hide"><?php // phpcs:ignore ?>
                        <div id="content" class="mobile-hide">
                            <div id="name">{{ $galleryItem->title }}</div>
                            <div id="des">{{ $galleryItem->description }}</div>
                        </div>
                    </div>
                @endif
            @endforeach
            @foreach($gallery as $galleryItem)
                @if($galleryItem->visible == true)
                    <div id="item" style="background-image: url({{ $galleryItem->imageSrc }}); display:none;" class="mobile-hide"><?php // phpcs:ignore ?>
                        <div id="content">
                            <div id="name">{{ $galleryItem->title }}</div>
                            <div id="des">{{ $galleryItem->description }}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div id="buttons" class="mobile-hide">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
        <div id="mobileButtons" class="mobile-show" style="display: none;">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
    @endif
    <script>
        document.getElementById('next').onclick = function(){
            let lists = document.querySelectorAll('#item');
            document.getElementById('slide').appendChild(lists[0]);
        }

        document.getElementById('prev').onclick = function(){
            let lists = document.querySelectorAll('#item');
            document.getElementById('slide').prepend(lists[lists.length - 1]);
        }
    </script>
</body>
</html>