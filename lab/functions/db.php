<?php
require_once('generic.php');


function connectToDatabase() {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "lab_test_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}


function selectFromDatabase ($sql) {

    exitIfQueryEmpty($sql, "Query is empty" . __LINE__);

    $conn = connectToDatabase();
    $result = $conn->query($sql);
    $data = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();
    return $data;
    
}

function createUser($userData) {
    $conn = connectToDatabase();

    $username = $userData['username'];
    $email = $userData['email'];
    $password = $userData['password'];
    
    $sql = "INSERT INTO users (user_name, email, password)
            VALUES ('{$username}', '{$email}', '{$password}')";

    if ($conn->query($sql) === TRUE) {
        redirectTo('../index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}