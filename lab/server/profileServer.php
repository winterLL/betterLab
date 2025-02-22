<?php

require('../functions/db.php');

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
}

if (isPostRequest()){
    // exit(var_dump($_POST));
    $username = $_SESSION['username'];

    $sql = "SELECT id
            FROM users
            WHERE user_name = '{$username}'";
    
    $userId = selectFromDatabase($sql)[0]['id'];
    // exit(var_dump($userId));

    if (isset($_POST['newTask'])) {
        $newTask = addslashes($_POST['newTask']);

        $sql = "INSERT INTO list (user_id, content)
                VALUES ('{$userId}', '{$newTask}')";
        insertIntoDatabase($sql);
    }else{
        $newNote = addslashes($_POST['newNote']);

        $sql = "INSERT INTO notes (user_id, content)
                VALUES ('{$userId}', '{$newNote}')";
        insertIntoDatabase($sql);
    }
    
}

?>