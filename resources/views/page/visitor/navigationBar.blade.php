    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />

        <!-- Navigation-->
        <style>
            nav{
                z-index: 999;
            }
        </style>
    </head>
    <body>
        <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-5">
                <a class="navbar-brand" href="/">
                    <img src="{{$navigationBarLogo}}" width="200px" alt="logoLIS2023" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/visitor/presentationSchedule">Presentation Schedule</a></li>
                        <li class="nav-item"><a class="nav-link" href="/callForReviewer">Call For Reviewer</a></li>
                        <li class="nav-item dropdown">
                            <li class="nav-item"><a class="nav-link" href="/gallery">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="/faqVisitor">Contact Us</a></li>
                        </li>
                        <a href="/registration" class="btn btn-primary">Register</a>
                        <a href="/login" class="btn btn-primary">Login</a>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="preloader">
                <div class="spinner"></div>
                <div class="preloader-text">Loading...</div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                const preloader = document.querySelector(".preloader");
                const preloaderDuration = 400;

                const hidePreloader = () => {
                setTimeout(() => {
                preloader.classList.add("hide");
                }, preloaderDuration);
                }
                
                window.addEventListener("load", hidePreloader);
                
            </script>
        </nav>
    </body>
    </html>