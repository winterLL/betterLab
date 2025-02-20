<?php
    // include '../functions/generic.php';
    include ('../functions/db.php');

    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="done">
        <h1>Completed Tasks</h1>
        <button class="add">+</button>
        <p class="done"><?php echo showList("list", "done") ?></p>
    </div>
    <div class="active">
        <h1>Active Tasks</h1>
        <button class="add">+</button>
        <p class="done"><?php echo showList("list", "active") ?></p>
    </div>
    <div class="notes">
        <h1>Notes</h1>
        <button class="add">+</button>
        <p class="done"><?php echo showList("notes", "note") ?></p>
    </div>
</body>
</html>