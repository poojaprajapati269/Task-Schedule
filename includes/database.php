<?php
    function getConnection() {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "joomdev";

        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
?>
