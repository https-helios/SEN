
<?php
session_start();
include_once("connection.php");
//header("location:Users.php");
array_map("htmlspecialchars", $_POST);
#below from line 8-12 is to check for array keys
// if (isset($array['Email'])) {
//     echo $array['Email'];
// } else {
//     echo 'Key does not exist';
// }


$stmt=$conn->prepare('INSERT INTO "SEN"."tblStudent"(Forename, Surname, House, YearGroup)
VALUES (:Forename, :Surname, :House, :YearGroup)');
$stmt->bindParam(":Name", $_POST["Name"]);
$stmt->bindParam(":Email", $_POST["Email"]);
$stmt->bindParam(":Password", $hashed_password);
$stmt->bindParam(":CreatedAt", $date);
$stmt->bindParam(":role", $role);
$stmt->execute();
$conn=null;
?>

