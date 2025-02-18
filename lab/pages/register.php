
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Register</title>
</head>
<body>
    <div class="conteiner">
        <div class="con_chld a"> 
            <h1>My List</h1>
            <form action="../server/registerServer.php" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <input type="email" name="email" placeholder="Email" required>
                <br>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <input type="password" name="password2" placeholder="Confirm Password" required>
                <br>
                <button type="submit">Register</button>
            </form>

            <?php
            session_start();
            if (isset($_SESSION['error_message'])):
            ?>
                <p class="errorMessage"><?php echo $_SESSION['error_message']; 
                unset($_SESSION['error_message']); ?></p>
            <?php endif; ?>
        </div>
        <div class="con_chld b">
            <div class="logo"></div>
        </div>
    </div>
</body>
</html>