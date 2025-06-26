<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SEN</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="indexStyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
      <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" >PUPILS</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about">Back To Login</a></li> <!-- change to back to login -->
                  </ul>
                </div>
              </div>
            </nav>
          
          <div class="FirstName">
              <h1>
                  FirstName
              </h1>
              <label>First Name</lable>
              <select name = "FistNameSearch">
                <option value = "" selected = "selected"></option>
              </select>
              <?php
              include_once("connection.php");
              $stmt=$conn->prepare('SELECT * FROM "SEN"."tblStudent" ');
              $stmt->execute();
              while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                  echo($row["Forename"]);
                }
              ?>
          </div>
    </body>
</html>