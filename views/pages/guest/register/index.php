<?php
//Start the session
session_start();

include("../../../sections/header.php");
include("../../../../config/connection.php");
include("../../../../config/functions.php");

$randomUserId = new Functions();
$connection = new Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION["error_message"] = "The fields cannot be empty. Please enter valid information.";
    } else {
        // Save to database
        $user_id = $randomUserId->randomUserId(5);
        $session = 0;
        $session_token = "";

        try {
            $usersQuery = 'INSERT INTO users(user_id,username, email, password, session, session_token) VALUES (?,?, ?, ?, ?, ?)';
            // Use the PDO instance for preparing the statement
            $statement = $connection->connect()->prepare($usersQuery);
            $statement->execute([$user_id, $username, $email, $password, $session, $session_token]);
            exit;
        } catch (PDOException $pdoException) {
            echo "Error: " . $pdoException->getMessage();
        }

        echo '<div class="alert alert-success" role="alert">User inserted successfully</div>';
    }
}

// Close the database connection
$connection->closeConnection();
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
                                <form method="POST" id="registerForm" role="form" accept-charset="UTF-8">

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_username"><b>Username:</b></label>
                                            <input type="text" name="username"
                                                class="form-control border border-dark rounded" placeholder="JohnDoe"
                                                title="Username" autocomplete="off" autofocus>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_email"><b>Email:</b></label>
                                            <input type="text" name="email"
                                                class="form-control border border-dark rounded"
                                                placeholder="johndoe@yahoo.com" title="Email" autocomplete="off"
                                                autofocus>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                            <label for="input_password"><b>Password:</b></label>
                                            <input type="password" name="password"
                                                class="form-control border border-dark rounded" title="Password"
                                                autocomplete="off" autofocus>
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