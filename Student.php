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
            <select name = "TutorID"> 
        <?php
            include_once("connection.php");
            ini_set('display_errors', 1);
            error_reporting(E_ALL);

            // Prepare and execute
            $stmt = $db->prepare('SELECT * FROM "SEN"."tblTutor" ORDER BY Forename');
            if (!$stmt->execute()) {
                $error = $stmt->errorInfo();
                echo "SQL Error: " . $error[2];
                exit;
            }

            // Fetch and display all rows
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($rows) === 0) {
                echo "No tutors found.";
            } else {
                foreach ($rows as $row) {
                    //print_r($row);
                    $TutorID = htmlspecialchars($row["tutorid"]);
                    $Forename = htmlspecialchars($row["forename"]);
                    echo '<option value="' . $TutorID . '">' . $Forename . '</option>';
                }
            }

        ?>
        </select>
        <input type="submit" value="Add Student">
        </form>
    </body>    
</html>
