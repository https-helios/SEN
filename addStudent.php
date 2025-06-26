
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
$stmt->bindParam(":Forename", $_POST["Forename"]);
$stmt->bindParam(":Surname", $_POST["Surname"]);
$stmt->bindParam(":House", $_POST["House"]);
$stmt->bindParam(":YearGroup", $_POST["YearGroup"]);

$stmt->execute();
$conn=null;
?>

