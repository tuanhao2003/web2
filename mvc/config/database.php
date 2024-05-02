<?php
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "watchstore";
    
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // else {
        //     echo "<script>alert('Connect Succesfully!');</script>";
        // }
        return $conn;
    }

?>