<?php
require('../functions/db.php');
// require_once('../functions/generic.php');

startSession();

if (isPostRequest()) {
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT user_name , password
                FROM users
                WHERE user_name = '{$username}' OR password = '{$password}'";

        // exit($sql);
        $userDetails= selectFromDatabase($sql);
        // exit(var_dump($userDetails));

        if (!empty($userDetails)) {
            if ($userDetails[0]['password'] === $password) {
                $_SESSION['username'] = $username;
                redirectTo('../pages/profile.php');
            }else {
                $_SESSION['error_message'] = 'Wrong password';
                redirectTo('../index.php');
            }
        } else {
            $_SESSION['error_message'] = 'Username does not exist';
            redirectTo('../index.php');
        }
    }
}

?>