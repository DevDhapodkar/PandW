<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="feedback.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("config1.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $description = $_POST['description'];

            if(empty($username) || empty($email) || empty($description)) {
               
                echo "<div class='message'>
                <p>Please fill all the fields!</p>
                </div> <br>";
                echo "<a href='feedback.php'><button class='btn'>Go back</button>";
                
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='message'>
                <p>Please enter a valid email address!</p>
                </div> <br>";
                echo "<a href='feedback.php'><button class='btn'>Go back</button>";
            }
            else{

                mysqli_query($con,"INSERT INTO feedback(username,email,description) VALUES('$username','$email','$description')") or die("Error Occured");

                echo "<div class='message'>
                          <p>Feedback Submitted successfully!</p>
                      </div> <br>";
                echo "<a href='index.php'><button class='btn'>Go to Home</button>";
         

            }

         }else{
         
        ?>

            <header>Feedback</header>
            <form action="" method="post" novalidate>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                
                <div class="field input">
                    <label for="textarea">Description</label>
                    <textarea class="textarea" name="description" id="description" cols="30" rows="6"></textarea>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Submit" required>
                </div>
               
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
