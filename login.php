<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Login</h2>
        <?php
        $username = isset($_GET["user"]) ? htmlspecialchars($_GET["user"]) :"";
        ?>
        <form action="login_logic.php">
            <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required><br>
            <input type="password" name="password" id="loginPassword" placeholder="Password" required>
            <br>
            <input type="submit">
        </form>
    </body>
</html>