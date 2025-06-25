<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <script src="signup.js" defer></script>
        <link rel="stylesheet" href="library.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    <body>
        <h2>Sign Up</h2>
        <div>
            <form action="signup_logic.php" method="POST">
                <h4>Name</h4>
                <input type="text" placeholder="Username" name="username" required><br>
                <input type="text" placeholder="Forename" name="forename" maxlength="20" required><br>
                <input type="text" placeholder="Surname" name="surname" maxlength="20" required><br>
                
                <br>
                
                <h4>Date Of Birth</h4><br>
                <select id="year" name="year" placeholder="Year" required>

                </select>
                <select id="month" name="month" placeholder="Month" required>
                    <option value="01">January</option>
                    <option value="02">Febuary</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select id="day" name="day" placeholder="Day" required>
                    <option value=""></option>
                </select>
                
                <h4>Email</h4>
                <input type="email" name="email" placeholder="Email" required><br>
                
                <h4>Password</h4>
                <div>
                    <input name="password" type="password" id="password" placeholder="Password" required>
                    <i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                </div>
                <div>
                    <input name="confirm" type="password" id="confirmPassword" placeholder="Confirm Password" required>
                    <i class="fa-solid fa-eye" id="toggleConfirmPassword" style="cursor: pointer;"></i>
                </div>
                <br>
                
                <button type="submit" id="signupbutton">SignUp</button>
            </form>
        </div>
    </body>
</html>