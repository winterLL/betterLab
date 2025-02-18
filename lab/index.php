<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>My List</title>
</head>
<body>
    <div class="conteiner">
        <div class="con_chld a"> 
            <h1>My List</h1>
            <form action="server/login.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <button type="submit">Login</button>
            </form>

            <?php
            session_start();
            if (isset($_SESSION['error_message'])):
            ?>
                <p class="errorMessage"><?php echo $_SESSION["error_message"];
                unset($_SESSION["error_message"])?></p>
            <?php endif; ?>
            <hr>
            <p>Don't have an accound? <a href="pages/register.php">Register!</a></p>
        </div>
        <div class="con_chld b">
            <div class="logo"></div>
        </div>
    </div>
</body>
</html>