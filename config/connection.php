<?php

class Connection {
    private $databaseConnect;

    public function connect() 
    {
        $host = 'localhost';
        $database = 'vanillaphp';
        $username = 'root';
        $password = 'Root_Admin@1000%';

        try {
            $this->databaseConnect = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            // Set PDO Error mode to Exception
            $this->databaseConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connection Successful";
            return $this->databaseConnect;
        } catch (PDOException $pdoException) {
            echo '<div class="alert alert-danger" role="alert">Connection Failed: ' . $pdoException->getMessage() . '</div>';
        }
    }

    public function closeConnection()
    {
        // echo "Connection Closed";
        return $this->databaseConnect = null;
    }
}



