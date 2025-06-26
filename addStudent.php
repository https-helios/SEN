
<?php
session_start();
include_once("connection.php");
//header("location:Users.php");
array_map("htmlspecialchars", $_POST);
print_r($_POST);
#below from line 8-12 is to check for array keys
// if (isset($array['Email'])) {
//     echo $array['Email'];
// } else {
//     echo 'Key does not exist';
// }

try{

    $stmt=$db->prepare('INSERT INTO "SEN"."tblStudent"(forename, surname, yeargroup, tutorid, house)
    VALUES (:Forename, :Surname, :YearGroup, :TutorID, :House)');
    $stmt->bindParam(":Forename", $_POST["Forename"]);
    $stmt->bindParam(":Surname", $_POST["Surname"]);
    $stmt->bindParam(":YearGroup", $_POST["YearGroup"]);
    $stmt->bindParam(":TutorID", $_POST["TutorID"]);
    $stmt->bindParam(":House", $_POST["House"]);

    $stmt->execute();
    $db=null;
}
catch (PDOException $e) {
    echo "<br><br><br><b>Error: " . $e->getMessage() . "</b>";
}
?>

