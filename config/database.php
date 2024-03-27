<?php
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "watchstore";
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        // else {
        //     echo "<script>alert('Connect Succesfully!');</script>";
        // }
        return $conn;
    }

?>