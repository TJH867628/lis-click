<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Gallery</title>
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet"/>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <style>
            body{
                background-color: #eaeaea;
                overflow: hidden;
            }
            #container{
                margin-top: 25px;
                position: absolute;
                left:50%;
                top:50%;
                transform: translate(-50%,-50%);
                width:800px;
                height:500px;
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
                left:88%;
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
                backdrop-filter: blur(50px);
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
            #content {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                padding: 20px;
                background-color: rgba(0, 0, 0, 0.5);
                color: #fff; /* default color */
            }

            #item.light #content div{
                color: #000; /* reverse color for light images */
            }

            #item.dark #content div{
                color: #f5f5f5; /* reverse color for dark images */
            }
            #prev{
                margin-right: 1000px;
                margin-bottom: 100px;
            }
            #next{
                margin-left: 100px;
            }
    </style>
    </head>
    <body>
    @if($gallery->isNotEmpty())
    <div id="container">
        <div id="slide">
            @foreach($gallery as $galleryItem)
                @if($galleryItem->visible == true)
                    <div id="item" style="background-image: url('{{ $galleryItem->imageSrc }}');"><?php // phpcs:ignore ?>
                        <img src="{{ $galleryItem->imageSrc }}" id="item-img" alt="" style="display: none;  margin-right: 1000px; ">
                        <div id="content">
                            <div id="name">{{ $galleryItem->title }}</div>
                            <div id="des">{{ $galleryItem->description }}</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        
    </div>
    <div id="buttons">
            <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
            <button id="next"><i class="fa-solid fa-angle-right"></i></button>
        </div>  
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.4.0/color-thief.min.js" integrity="sha512-r2yd2GP87iHAsf2K+ARvu01VtR7Bs04la0geDLbFlB/38AruUbA5qfmtXwXx6FZBQGJRogiPtEqtfk/fnQfaYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.getElementById('next').onclick = function(){
            let lists = document.querySelectorAll('#item');
            document.getElementById('slide').appendChild(lists[0]);
        }

        document.getElementById('prev').onclick = function(){
            let lists = document.querySelectorAll('#item');
            document.getElementById('slide').prepend(lists[lists.length - 1]);
        }
        
        $(document).ready(function() {
            var items = document.querySelectorAll('#item');
            var colorThief = new ColorThief();
            items.forEach(function(item) {
                var img = item.querySelector('#item-img');
                img.addEventListener('load', function() {
                    var dominantColor = colorThief.getColor(img);
                    console.log(item,dominantColor);
                    if (dominantColor[0] + dominantColor[1] + dominantColor[2] > 382.5) {
                        item.classList.add('light');
                    } else {
                        item.classList.add('dark');
                    }
                });
            });
        });
    </script>
</body>
</html>