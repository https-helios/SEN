<!DOCTYPE html>
<html>
    <head>
        <title>
            Add Student Page
        </title>
    </head>
    <body>
        <form action="addStudent.php" method="post">
            Forename:<input type = "text" name="Forename"><br>
            Surname:<input type = "text" name="Surname"><br>
            House:<input type ="text" name ="House"><br>
            YearGroup:<input type ="number" name="YearGroup"><br>
            <select name = "TutorID"></select>
            <input type="submit" value="Add Student">
        </form>
        <?php
            include_once("connection.php");
            $stmt=$db->prepare('SELECT * FROM "SEN"."tblStudent"');
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo($row["Forename"].", ".$row["Surname"].",".$row["House"].",".$row["YearGroup"]."<br>");
                }

            // $_POST["submit"]

            try{
                $stmt = $db->prepare('SELECT "TutorID","Forename" FROM "SEN"."tblTutor" ORDER BY "Forename"');
                $stmt->execute();
    
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                    $TutorID = htmlspecialchars($row["TutorID"]);
                    $Forename = htmlspecialchars($row["Forename"]);
                    echo '<option value="' . $TutorID . '">' . $Forename . '</option>';

                }
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }

        ?>
    </body>    
</html>
