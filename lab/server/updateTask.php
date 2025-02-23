<?php 

require('../functions/db.php');

session_start();

if(isPostRequest()){

    foreach ($_POST as $key => $value) {
        $sql = "UPDATE list
                SET state = 'done'
                WHERE id = '{$key}'";
        insertIntoDatabase($sql);
    }
    redirectTo("../pages/profilePage.php");
    exit();
}

?>