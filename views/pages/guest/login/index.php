<?php
include("../../../sections/header.php");
include("../../../../config/connection.php");
?>

<style>
    #loginContainer {
        height: 100vh;
        background: #CCD3D9;
    }

    #loginFormCard {
        margin-top: 15%;
    }
</style>

<body>
    <div class="container-fluid" id="loginContainer">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4"></div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card shadow rouded" id="loginFormCard">
                    <div class="card-header bg-secondary">
                        <h5 class="text-uppercase text-white">Login Portal</h5>
                    </div>

                    <div class="card-body">
                        <form action="index.php" method="POST" id="loginForm" role="form" accept-charset="UTF-8">

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <label for="input_username"><b>Username/Email:</b></label>
                                    <input type="text" class="form-control border border-dark rounded" placeholder="JohnDoe" title="Username" 
                                        autocomplete="off" autofocus>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <label for="input_password"><b>Password:</b></label>
                                    <input type="password" class="form-control border border-dark rounded" title="Password" 
                                        autocomplete="off" autofocus>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <span>Don't have an account?</span><a class="text-decoration-none" href="../register/index.php">Register</a>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                    <button type="submit"
                                        class="btn btn-success float-end text-white text-uppercase rounded small">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4"></div>
        </div>
    </div>
</body>

</html>