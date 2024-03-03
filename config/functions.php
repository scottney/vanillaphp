<?php

class Functions {

    public function checkLogin($databaseConnect)
    {
        $id = $_SESSION["user_id"];
        $query = "SELECT * FROM `users` WHERE `user_id` = '$id' limit 1";
        $result = mysqli_query($databaseConnect, $query);

        if($result && mysqli_num_rows($result) > 0) {
            $userData = mysqli_fetch_assoc($result);

            return $userData;
        }

        // Redirect to login page 
        header("Location: /views/pages/guest/login/index.php");
        die;
    }

    public function randomUserId($length)
    {
        $text = "";

        if($length < 3) {
            $length = 3;
        }

        $len = rand(4, $length);

        for($i=0; $i < $len; $i++) {
            $text .= rand(0, 9);
        }

        return $text;
    }

}


