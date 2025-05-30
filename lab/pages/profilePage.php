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
    <link rel="stylesheet" href="../css/pfileStyle.css">
    <link rel="stylesheet" href="../css/popupStyles.css">
    <title>Document</title>
</head>
<body>
    <!-- olokliromena task -->
    <div class="done">
        <h1>Completed Tasks</h1>

        <!-- <button class="add">+</button> -->

        <p class="doneParagraph">
            <ul>
                <?php showList("list", "done") ?>
            </ul>
        </p>
    </div>

    <!-- task pou den exoun oloklirothei -->
    <div class="active">
        <h1>Active Tasks</h1>

        <!-- to popup -->
        <button type="button" onclick="openPopup('taskPopup')" class="add">+</button>
        <div id="taskPopup" class="popup">
            <div class="popup-content">
                <span class="close-popup" onclick="closePopup('taskPopup')">&times;</span>
                <form action="../server/profileServer.php" method="post">
                    <textarea type="text" name="newTask" id="newTask" placeholder="Add a task"></textarea>
                    <button class="submit-button" type="submit">Add Task</button>
                </form>
            </div>
        </div>

        <form action="../server/updateTask.php" method="post">
            <p class="activeParagraph">
                <ol>
                    <?php showCheckList("list", "active") ?>
                </ol>
            </p><br>
            <button type="submit" class="submit-button">Done</button>
        </form>
    </div>

    <!-- notes -->
    <div class="notes">
        <h1>Notes</h1>

        <!-- to popup -->
        <button type="button" onclick="openPopup('notePopup')" class="add">+</button>
        <div id="notePopup" class="popup">
            <div class="popup-content">
                <span class="close-popup" onclick="closePopup('notePopup')">&times;</span>
                <form action="../server/profileServer.php" method="post">
                    <textarea type="text" name="newNote" id="NewNote"  placeholder="Add a note"></textarea>
                    <button class="submit-button" type="submit">Add Note</button>
                </form>
            </div>
        </div>

        <p class="notesParagraph">
            <?php showList("notes", "note") ?>
        </p>
    </div>

    <script src="../js/functions.js" defer></script>
</body>
</html>