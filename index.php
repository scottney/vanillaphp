<?php
require("views/sections/header.php");
?>

<style type="text/css">
    #main_dashboard_navigation_menu {
        border-bottom: 1px solid white;
        position: fixed;
        width: 100%;
        z-index: 10;
    }

    #navBarLogo {
        width: 100px;
        height: 100px;
        border: 1px solid white;
        border-radius: 50%;
    }

    #indexPageContainer {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 900px;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-0">

                <div class="row m-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-0">

                        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="main_dashboard_navigation_menu">
                            <div class="container-fluid p-0">
                                <a class="navbar-brand text-warning text-uppercase" href="/">
                                    <img src="public/images/php-navbar-logo.jpg" id="navBarLogo">
                                </a>

                                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="">AboutUs</a>
                                        </li>
                                    </ul>

                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 pe-5">
                                        <li class="nav-item">
                                            <a class="nav-link active text-white" aria-current="page" href="views/pages/guest/register/index.php" target="_blank">Register</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-white" href="views/pages/guest/login/index.php" target="_blank">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-0">
                        <img src="public/images/php-background-image.jpg" id="indexPageContainer">
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-0">

                        <?php
                            require("views/sections/footer.php");
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>