<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="image.css">
    <title>Input Image With Preview Image</title>
</head>

<body>
    <?php
    if (isset($_POST['form_submit'])) {
        $title = $_POST['title'];
        $folder = "uploads/";
        $image_file = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $path = $folder . $image_file;
        $target_file = $folder . basename($image_file);
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        //Allow only JPG, JPEG, PNG & GIF etc formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';
        }
        //Set image upload size 
        if ($_FILES["image"]["size"] > 5000000000) {
            $error[] = 'Sorry, your image is too large. Upload less than 500 KB in size.';
        }
        if (!isset($error)) {
            move_uploaded_file($file, $target_file);
            $result = mysqli_query($db, "INSERT INTO items(image,title) VALUES('$image_file','$title')");
            if ($result) {
                $image_success = 1;
                
            } else {
                echo 'Something went wrong';
            }
        }
    }


    if (isset($error)) {

        foreach ($error as $error) {
            echo '<div class="message">' . $error . '</div><br>';
        }
    }
   
    ?>


    <div class="container">
        <div class="box form-box">

            <?php if (isset($image_success)) {
                echo "<div class='message'>
                <p>This email is used, Try another One Please!</p>
            </div> <br>";
      echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
      header("Location: displayimage.php");
            } ?>

            <header>Upload Image</header>
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="image" id="file" accept="image/*" hidden>
                <div class="img-area" data-img="">
                    <i class='bx bxs-cloud-upload icon'></i>
                    <h3>Upload Image</h3>
                    <p>Maximum size of image should be <span>10MB</span></p>
                </div>
                <button class="select-image">Select Image</button>
                <div class="field input">
                    <label for="title">Description</label>
                    <input type="text" name="title" id="username" autocomplete="off" required>
                </div>
                <div class="field">

                    <a href="upload image\display.php"><input type="submit" class="select-image" name="form_submit" value="Upload" a href="displayimage.php" required></a>



                    <script src="script.js"></script>
            </form>
        </div>
    </div>
    </div>

</body>

</html>