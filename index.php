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
        <script src="index.js" defer></script>
        <script type = "text/javascript">
          // $(document).ready(function(){
          //   $('#search_category_id').change(function(){
          //     $.post("/get_child_categories", {
          //       parent_id:$('#search_category_id').val(),
          //     },function(response){
          //       $('#show_sub_categories').html(response);
          //     });
          //   });
          // });
          function(response){
            if (response.error) {
              $('#show_sub_categories').html('<p>No student found.</p>');
            } else {
              const student = response[0];
              $('#show_sub_categories').html(
                `<p>Name: ${student.forename} ${student.surname}</p>
                <p>House: ${student.house}</p>
                <p>Year Group: ${student.yeargroup}</p>`
              );
            }
          }
        </script>
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
            <h1>First Name</h1>
            <label>First Name</lable>
            <select name = "search_category" id="search_category_id" class = "form-control">
                <option value = "" selected = "selected"></option>
                {% for row in tblStudent %}
                <option value = '{{row.StudentID}}'>{{row.Forename}}</option>
                {% endfor %}
            </select>
        </div>
    </body>
<html