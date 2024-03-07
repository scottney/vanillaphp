<?php
//Start the session
session_start();

require_once("../../../../config/connection.php");
require_once("../../../../config/functions.php");

$randomUserId = new Functions();
$connection = new Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION["error_message"] = "The fields cannot be empty. Please enter valid information.";
        $_SESSION["username_error_message"] = "Username field required";
        $_SESSION["email_error_message"] = "Email field required";
        $_SESSION["password_error_message"] = "Password field required";

        header("Location: index.php");
        die;
    }

    if(strlen($username) < 3) {
        $_SESSION["username_error_message"] = "The username is too short";

        header("Location: index.php");
        die;
    }

    if(strlen($email) < 3) {
        $_SESSION["email_error_message"] = "The email is too short";

        header("Location: index.php");
        die;
    }

    if(strlen($password) < 8) {
        $_SESSION["password_error_message"] = "The password is too short";

        header("Location: index.php");
        die;
    }

    if(strlen($username) > 23) {
        $_SESSION["username_error_message"] = "The username is too long";

        header("Location: index.php");
        die;
    }

    if(strlen($email) > 75) {
        $_SESSION["email_error_message"] = "The email is too long";

        header("Location: index.php");
        die;
    }

    if(strlen($password) > 255) {
        $_SESSION["password_error_message"] = "The password is too long";

        header("Location: index.php");
        die;
    }

    // For some reason this regex is not working
    if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $_SESSION["password_error_message"] = "The password is invalid";

        header("Location: index.php");
        die;
    }

    try {
        $existingUsernameQuery = 'SELECT * FROM `users` WHERE `username` = :username';
        // Use the PDO instance for preparing the statement
        $existingUsernameStatement = $connection->connect()->prepare($existingUsernameQuery);
        // Bind the parameter
        $existingUsernameStatement->bindParam(':username', $username, PDO::PARAM_STR);
        // Execute the statement
        $existingUsernameStatement->execute();
        // Fetch the result if needed
        $existingUsername = $existingUsernameStatement->fetch(PDO::FETCH_ASSOC);
    
        if($existingUsername) {
            $_SESSION["username_error_message"] = "The username has already been taken";
            header("Location: index.php");
            die;
        }
    } catch (PDOException $pdoException) {
        echo "Error: " . $pdoException->getMessage();
    }

    try {
        $existingUserEmailQuery = 'SELECT * FROM `users` WHERE `email` = :email';
        // Use the PDO instance for preparing the statement
        $existingUserEmailStatement = $connection->connect()->prepare($existingUserEmailQuery);
        // Bind the parameter
        $existingUserEmailStatement->bindParam(':email', $email, PDO::PARAM_STR);
        // Execute the statement
        $existingUserEmailStatement->execute();
        // Fetch the result if needed
        $existingUserEmail = $existingUserEmailStatement->fetch(PDO::FETCH_ASSOC);
    
        if($existingUserEmail) {
            $_SESSION["email_error_message"] = "The email has already been taken";
            header("Location: index.php");
            die;
        }
    } catch (PDOException $pdoException) {
        echo "Error: " . $pdoException->getMessage();
    }

    // Save to database
    $user_id = $randomUserId->randomUserId(5);
    $session = 0;
    $session_token = "";

    try {
        $usersQuery = 'INSERT INTO users(user_id,username, email, password, session, session_token) VALUES (?,?, ?, ?, ?, ?)';
        // Use the PDO instance for preparing the statement
        $statement = $connection->connect()->prepare($usersQuery);
        $statement->execute([$user_id, $username, $email, password_hash($password, PASSWORD_DEFAULT), $session, $session_token]);
        $_SESSION["user_success_register_message"] = "Registration successfull";
        header("Location: ../login/index.php");
        die;
    } catch (PDOException $pdoException) {
        echo "Error: " . $pdoException->getMessage();
    }

    // echo '<div class="alert alert-success" role="alert">User inserted successfully</div>';
}

// Close the database connection
$connection->closeConnection();

include_once("../../../sections/header.php");
?>

<style>
    #registerContainer {
        height: 100vh;
        background: #72A0C1;
    }

    #registerFormCard {
        margin-top: 15%;
    }
</style>

<body>
    <div class="container-fluid" id="registerContainer">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4"></div>

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                <div class="card shadow rouded" id="registerFormCard">
                    <div class="card-header bg-secondary">
                        <h5 class="text-uppercase text-white">Registration Portal</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <?php
                                // Check if error message is set in session
                                if (isset($_SESSION['error_message'])) {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                    echo $_SESSION['error_message'];
                                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                    echo '</div>';

                                    // Unset the error message from session to clear it after displaying
                                    unset($_SESSION['error_message']);
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <form action="index.php" method="POST" id="registerForm" role="form" accept-charset="UTF-8">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_username"><b>Username:</b></label>
                                            <input type="text" name="username"
                                                class="form-control border border-dark rounded" placeholder="JohnDoe"
                                                title="Username" autocomplete="off" minlength="3" maxlength="23" autofocus>

                                            <?php
                                            // Check if error message is set in session
                                            if (isset($_SESSION['username_error_message'])) {
                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                                echo $_SESSION['username_error_message'];
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';

                                                // Unset the error message from session to clear it after displaying
                                                unset($_SESSION['username_error_message']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_email"><b>Email:</b></label>
                                            <input type="email" name="email"
                                                class="form-control border border-dark rounded"
                                                placeholder="johndoe@yahoo.com" title="Email" autocomplete="off"
                                                minlength="3" maxlength="75" autofocus>

                                            <?php
                                            // Check if error message is set in session
                                            if (isset($_SESSION['email_error_message'])) {
                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                                echo $_SESSION['email_error_message'];
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';

                                                // Unset the error message from session to clear it after displaying
                                                unset($_SESSION['email_error_message']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_password"><b>Password:</b></label>
                                            <input type="password" name="password"
                                                class="form-control border border-dark rounded" title="Should contain at least 1 lowercase letter, 1 uppercase letter, 1 number and 1 special characters"
                                                autocomplete="off" minlength="8" maxlength="255" autofocus>

                                            <?php
                                            // Check if error message is set in session
                                            if (isset($_SESSION['password_error_message'])) {
                                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                                                echo $_SESSION['password_error_message'];
                                                echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                                echo '</div>';

                                                // Unset the error message from session to clear it after displaying
                                                unset($_SESSION['password_error_message']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                            <span>Already have an account?</span><a class="text-decoration-none"
                                                href="../login/index.php">Login</a>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                            <button type="submit"
                                                class="btn btn-success float-end text-white text-uppercase rounded small">Register</button>
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