<?php
require('../functions/db.php');
// require_once('../functions/generic.php');

startSession();

if (isPostRequest()){
    $userData = [
        'username' => addslashes($_POST['username']),
        'email' => addslashes($_POST['email']),
        'password' => addslashes($_POST['password']),
        'password2' => addslashes($_POST['password2'])
    ];

    $username = $userData['username'];

    $sql = "SELECT user_name
            FROM users
            WHERE user_name = '{$username}'";

    $data = selectFromDatabase($sql);

    // exit(var_dump($_SESSION));
    
    // exit('ola kala');

    if (empty($data)) {
        if ($userData['password'] !== $userData['password2']) {
            $_SESSION['error_message'] = 'Passwords do not match';
            redirectTo('../pages/registerPage.php');
        }else {
            createUser($userData);
            redirectTo('../index.php');
        }
        
    }else {
        $_SESSION['error_message'] = 'Username already exists';
        redirectTo('../pages/registerPage.php');
    }
}else {
    setError('this is not a post request');
    redirectTo('../pages/registerPage.php');
}



?>