<?php
$allow_output = true;
include_once("connection.php");
session_start();
print_r($_POST);

//sanitize input
$_POST = array_map("htmlspecialchars", $_POST);

try {
    $db->beginTransaction(); // Start a transaction


    $sql = 'INSERT INTO "SEN"."tblTutor" (Forename, Surname, House) VALUES (:forename, :surname, :house)';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':forename', $_POST["forename"]);
    $stmt->bindParam(':surname', $_POST["surname"]);
    $stmt->bindParam(':house', $_POST["house"]);
    if ($stmt->execute()) {
        echo "Statement executed.<br>";
    } else {
        echo "Statement failed.<br>";
        print_r($stmt->errorInfo());
    }

    $db->commit(); // Commit transaction

} catch (PDOException $e) {
    $db->rollBack(); // Rollback transaction if an error occurs
    die("Error: " . $e->getMessage());
}
?>