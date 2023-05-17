<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Download</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light">
                <div class="container px-5">
                    <a class="navbar-brand" href="/homePage">
                        <img src="images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/homePage">Home</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conference</a>
                            <ul class="dropdown-menu dropdown-menu-end bg-light" aria-labelledby="navbarDropdownBlog">      
                                <li><a class="dropdown-item" href="/conferencesInfo">Conference Info</a></li>
                                <li><a class="dropdown-item" href="/conferencesDownload">Downloads</a></li>
                            </ul>
                            <li class="nav-item"><a class="nav-link" href="/publicationInfo">Publication</a></li>
                            <li class="nav-item"><a class="nav-link" href="/faq">Contact Us</a></li>
                                
                            <a href="login.html" class="btn btn-primary">Hi , {{$userSession}}</a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Header-->
            <header class="bg-light ">
                <div class="container px-5">
                  <section class="py-5" id="features">
                    <div class="container ">
                        <div class="text-center text-dark my-5">
                            <h2 class="fw-bolder">Conference Download</h2>
                              </div>
                              <table class="table text-dark border">
                                  <thead class="thead-dark">
                                  <tr class="table-dark text-center">
                                      <th scope="col">No</th>
                                      <th scope="col">Conference</th>
                                      <th scope="col"></th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr>
                                      <th scope="row">1</th>
                                      <td>LIS 2023 Author Guideline</td>
                                      <td>
                                          <a href="conferences_info\LIS 2023 AUTHORs GUIDELINE .docx" class="btn btn-primary mb-4" download="">Download</a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">2</th>
                                      <td>LIS 2023 Full Paper Template</td>
                                      <td>
                                      <a href="conferences_info\LIS2023_FULL-PAPER-TEMPLATE.docx" class="btn btn-primary mb-4 " download="">Download</a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">3</th>
                                      <td>LIS 2023 Abstract Template</td>
                                      <td>
                                      <a href="conferences_info\LIS2023_ABSTRACT-TEMPLATE.docx" class="btn btn-primary mb-4" download="">Download</a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">4</th>
                                      <td>LIS 2023 Poster Guideline</td>
                                      <td>
                                      <a href="conferences_info\LIS 2023 POSTER PRESENTATION GUIDELINE.docx" class="btn btn-primary mb-4" download="">Download</a>
                                      </td>
                                  </tr>
                                  <tr>
                                      <th scope="row">5</th>
                                      <td>LIS 2023 Poster Template</td>
                                      <td>
                                      <a href="conferences_info\LIS 2023 POSTER PRESENTATION GUIDELINE.docx" class="btn download btn-primary mb-4" download="">Download</a>
                                      </td>
                                  </tr>
                                  </tbody>
                              </table>
                          </div>
                    </section>        
                </div>
            </header>

  
            <!-- Participant section-->
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                </div>
            </div>

            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                    <div class="row gx-5">
                </div> 
                    
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">New Item, delivered to you.</div>
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
                        <a class="link-light small" href="FeFaq.html">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <!--<script src="js/scripts.js"></script>-->
    </body>
</html>
