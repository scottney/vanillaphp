<?php
session_start();

require_once("../../../../config/connection.php");

$connection = new Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)) {
        $_SESSION["username_login_error"] = "The username is required";

        header("Location: index.php");
        die;
    }

    if (empty($password)) {
        $_SESSION["password_login_error"] = "The password is required";

        header("Location: index.php");
        die;
    }

    $userDataQuery = "SELECT * FROM `users` WHERE `username` = :username OR `email` = :username LIMIT 1";
    $existingUserAccountStatement = $connection->connect()->prepare($userDataQuery);
    $existingUserAccountStatement->bindParam(':username', $username, PDO::PARAM_STR);
    $existingUserAccountStatement->execute(['username' => $username, 'password' => $password]);
    
    // Fetch user data
    $userData = $existingUserAccountStatement->fetch(PDO::FETCH_ASSOC);

    if (empty($userData)) {
        $_SESSION["user_does_not_exist_error"] = "The user does not exist on our platform";

        header("Location: index.php");
        die;
    }
    
    // Verify password if user data is fetched
    if ($userData && password_verify($password, $userData['password'])) {
        // Password is correct
        // Store user information in session variables
        $_SESSION["user_id"] = $userData["id"];
        $_SESSION["username"] = $userData["username"];

        // Redirect to dashboard or home page
        header("Location: ../../auth/dashboard.php");
        exit;
    } else {
        // Authentication failed
        
        header("Location: ");
    }
}

include_once("../../../sections/header.php");
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
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <?php
                                // Check if error message is set in session
                                if (isset($_SESSION['user_does_not_exist_error'])) {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                    echo $_SESSION['user_does_not_exist_error'];
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                    echo '</div>';

                                    // Unset the error message from session to clear it after displaying
                                    unset($_SESSION['user_does_not_exist_error']);
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <form action="index.php" method="POST" id="loginForm" role="form"
                                    accept-charset="UTF-8">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <?php
                                            // Check if error message is set in session
                                            if (isset($_SESSION['user_success_register_message'])) {
                                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                                echo $_SESSION['user_success_register_message'];
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';

                                                // Unset the error message from session to clear it after displaying
                                                unset($_SESSION['user_success_register_message']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_username"><b>Username/Email:</b></label>
                                            <input name="username" type="text" class="form-control border border-dark rounded"
                                                placeholder="JohnDoe" title="Username" autocomplete="off" autofocus>

                                            <?php
                                            // Check if error message is set in session
                                            if (isset($_SESSION['username_login_error'])) {
                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                                echo $_SESSION['username_login_error'];
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';

                                                // Unset the error message from session to clear it after displaying
                                                unset($_SESSION['username_login_error']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_password"><b>Password:</b></label>
                                            <input name="password" type="password" class="form-control border border-dark rounded"
                                                title="Password" autocomplete="off" autofocus>

                                            <?php
                                            // Check if error message is set in session
                                            if (isset($_SESSION['password_login_error'])) {
                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                                echo $_SESSION['password_login_error'];
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';

                                                // Unset the error message from session to clear it after displaying
                                                unset($_SESSION['password_login_error']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                            <span>Don't have an account?</span><a class="text-decoration-none"
                                                href="../register/index.php">Register</a>
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
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4"></div>
        </div>
    </div>
</body>

</html>