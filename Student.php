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
            Surname:<input type = "text" name="Authors"><br>
            House:<input type ="text" name ="House"><br>
            YearGroup:<input type ="number" name="YearGroup"><br>
            <input type="submit" value="Add Student">
        </form>
        <?php
            include_once("connection.php");
            $stmt=$conn->prepare('SELECT * FROM "SEN"."tblStudent"');
            $stmt->execute();
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo($row["Forename"].", ".$row["Surname"].",".$row["House"].",".$row["YearGroup"]."<br>");
                }

            $_POST["submit"]
        ?>
    </body>    
</html>
