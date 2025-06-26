<?php
include_once("connection.php");
session_start();
print_r($_POST);

//sanitize input
$_POST = array_map("htmlspecialchars", $_POST);

try {
    $conn->beginTransaction(); // Start a transaction


    $sql = 'INSERT INTO "SEN"."tblTutor" (forname, surname, house) VALUES (:forename, :surname, :house)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':house', $_POST["house"]);
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