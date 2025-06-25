<?php
include_once("connection.php");
session_start(); //Start session
print_r($_POST);
print('<br>');

$_POST = array_map('htmlspecialchars', $_POST);

$username = trim($_POST['username']);
$password = trim($_POST['password']);

$stmt = $db->prepare('SELECT * FROM "user"."tbluser" WHERE username = :username');
$stmt->bind_param(":username", $username, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$hash = trim($user["password"]);

if ($user) {
    echo('User Found <br>');
    echo($user['password'].'<br>');
    echo $password;
    echo('<br>');
    if (password_verify($password, $hash)) {
        echo "Password matches!";
        $_SESSION['memberno'] = $user['memberno'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
    } else {
        echo "Invalid Password";
    }
} else {
    echo "user not found";
}
?>