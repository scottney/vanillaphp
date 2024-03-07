<?php
include("../../../config/connection.php");
include("../../../config/functions.php");

session_start();

?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <?php
                        require("../../sections/header.php");
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    
                    <?php 
                    
                        if(isset($_SESSION["user_id"])) {
                            $userID = $_SESSION["user_id"];
                            echo "<p>Your user id is:". $userID ."</p>";
                        }

                        if(isset($_SESSION["username"])) {
                            $username = $_SESSION["username"];
                            echo "<p>Your username is:". $username ."</p>";
                        }
                        
                    ?>

                </div>
            </div>


            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-0">
                    <?php
                        require("../../sections/footer.php");
                    ?>
                </div>
            </div>

            </div>
        </div>
    </div>
</body>
</html>

