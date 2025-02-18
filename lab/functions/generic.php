<?php

//ksekina to session
function startSession() {
    if(!isset($_SESSION)) 
    { 
        session_start();
    } 
}

//elegxei an to request einai POST
function isPostRequest():bool {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

//kanei redirect
function redirectTo($destinationFile) {
    header("Location:$destinationFile");
}

//dimiourgei error message
function setError($errorMessage):void {
    $_SESSION['Error_Message'] = $errorMessage;
}

//elegxei an einai keno to query
function exitIfQueryEmpty($sql, $errorMessage){
    if (empty($sql)) {
        setError($errorMessage);
        redirectTo("../pages/error.php");
    }
}

?>
