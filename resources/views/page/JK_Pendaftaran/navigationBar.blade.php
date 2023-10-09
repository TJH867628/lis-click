    <link rel="icon" type="image/x-icon" href="/images/Logo_Title.png" />

<!-- Bootstrap icons-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="/css/styles.css" rel="stylesheet" />        

<!-- Navigation-->
<nav class="shadow-sm navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container px-5">
        <a class="navbar-brand" href="/homePage">
            <img src="/images/Logo1 (1).png" width="200px" alt="logoLIS2023" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="/homePage">Home</a></li>
                <li class="nav-item dropdown">
                    <li class="nav-item"><a class="nav-link" href="/submissionList">Submission List</a></li>
                    <li class="nav-item"><a class="nav-link" href="/account">My Profile</a></li>
                    <a href="/logout" class="btn btn-primary">Logout</a>
                </div>
            </ul>
        </div>
        <div class="preloader">
            <div class="spinner"></div>
            <div class="preloader-text">Loading...</div>
        </div>
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
    </div>
</nav>
