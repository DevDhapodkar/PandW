<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
            function validateEmail($email) {
                return filter_var($email, FILTER_VALIDATE_EMAIL);
            }

            function validateUsername($username) {
                return !preg_match('/\d/', $username);
            }

            include("config1.php");
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");

                if (mysqli_num_rows($verify_query) != 0) {
                    echo "<div class='message'>
                              <p>This email is already used. Please try another one!</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    if (!validateEmail($email)) {
                        echo "<div class='message'>
                                  <p>Please enter a valid email address.</p>
                              </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } elseif (!validateUsername($username)) {
                        echo "<div class='message'>
                                  <p>Username should not contain numbers.</p>
                              </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        mysqli_query($con, "INSERT INTO users(Username,Email,Password) VALUES('$username','$email','$password')") or die("Error Occurred");

                        echo "<div class='message'>
                                  <p>Registration successful!</p>
                              </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Login Now</button>";
                    }
                }
            } else {
            ?>
                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>


                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="login.php" class="link">Log In</a>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
