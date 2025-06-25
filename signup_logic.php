<?php
include_once("connection.php");
session_start();
print_r($_POST);

//sanitize input
$_POST = array_map("htmlspecialchars", $_POST);

// Validate email format
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Error: Invalid email format.");
}

// Trim and verify passwords match
$pwd = trim($_POST["password"]);
$confirmPassword = trim($_POST["confirm"]);
if ($pwd !== $confirmPassword) {
    die("Error: Passwords do not match.");
}

// Format date of birth
$day = str_pad($_POST["day"], 2, "0", STR_PAD_LEFT);
$dob = $_POST["year"]."-".$_POST["month"]."-".$day;
$role = 0;

try {
    $conn->beginTransaction(); // Start a transaction

    while (true) {
        $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM tblusers WHERE username = :username");
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row["count"] == 0) {
            break;
        }
        $username = $baseusername . $counter;
        $counter++;
    }
    // Secure password hashing
    $hashpassword = password_hash($pwd, PASSWORD_BCRYPT);

    $sql = 'INSERT INTO "user"."tbluser" (username, forname, surname, password, email, dob, role) VALUES (:username, :forename, :surname, :password, :email, :dob, :role)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST["username"]);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':password', $hashpassword);
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':dob', $dob);
    $stmt->bindParam(':role', $role);
    $stmt->execute();

    $conn->commit(); // Commit transaction

    // Redirect with username in URL
    header("Location: login.php?user=" . urlencode($username));
    exit();

} catch (PDOException $e) {
    $conn->rollBack(); // Rollback transaction if an error occurs
    die("Error: " . $e->getMessage());
}
?>