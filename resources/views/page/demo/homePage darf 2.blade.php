<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Page</title>
        <!-- Favicon-->
            <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/homepage_style.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="/homePage">Liga Ilmu Serantau</a>
                    <div style="color:white; font-size:30px; position:fixed; margin-left:200px;">
                        <p>Hi , {{ $userSession }}</p>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conference</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="/conferencesInfo">Conference Info</a></li>
                                    <li><a class="dropdown-item" href="/conferencesDownload">Downloads</a></li>
                                </ul>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Publication</a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                        <li><a class="dropdown-item" href="about.html">Organization Chart</a></li>
                                        <li><a class="dropdown-item" href="about.html">Jurnal</a></li>
                                    </ul>
                            <li class="nav-item"><a class="nav-link" href="pricing.html">Registration</a></li>
                            <li class="nav-item"><a class="nav-link" href="faq.html">Contact Us</a></li>
                            <div class="d-grid gap-8 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-3" href="/logout">logout</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Liga Ilmu Serantau 2023 9th International Conference</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Welcome to the 9th annual Liga Ilmu Serantau 2023, a milestone event that celebrates almost a decade of research, and collaboration. Since its inception, this conference has brought together experts, researchers, practitioners, and enthusiasts from across industries to explore the latest developments and trends in many fields. </p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Register now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="images/liga_poster.jpg" alt="..." /></div>
                    </div>
                </div>
            </header>

            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">LIS 2023 International Conference Welcomes Quality Research in The Area of :</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100" > 
                                    <h2 class="h5">- Engineering & Technology</h2>
                                    <h2 class="h5">- Technical Vocational Education and Training (TVET)</h2>
                                    <h2 class="h5">- Social Science</h2>
                                    <h2 class="h5">- Information Technology (IT) & Communication</h2>
                                    <h2 class="h5">- Environment & Health</h2>
                                    <h2 class="h5">- Renewable energy</h2>
                                    <h2 class="h5">- Commerce</h2>
                                    <h2 class="h5">- Multi-Discipline</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Participant section-->
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">Hurry Up! Only 142 Seats Remaining Currently ..</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <!--<img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="fw-bold">
                                        Tom Ato
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        CEO, Pomodoro
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">CONFERENCE AGENDA</h2>
                                <h2 class="fw-bolder"> POLITEKNIK MERSING</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                            </div>
                        </div>
                    </div> 
                    
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                                <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                            </div>
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                    <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                    <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                                </div>
                                <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        </main>

        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">© 2023 LIGA ILMU SERANTAU 2023. All Rights Reserved. Design by Politeknik Mersing</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>
