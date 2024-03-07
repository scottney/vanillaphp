<?php

class Functions {

    public function checkLogin($databaseConnect)
    {
        
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


