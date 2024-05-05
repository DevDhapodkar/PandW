<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="uploadgame.css">
    <title>Upload Game File and Image</title>
    
</head>
<body>
    
    <?php
    if (isset($_POST['form_submit'])) {
        $title = $_POST['title'];
        $folder = "uploads/";
        $image_file = $_FILES['image']['name'];
        $image_file_tmp = $_FILES['image']['tmp_name'];
        $game_file = $_FILES['game']['name'];
        $game_file_tmp = $_FILES['game']['tmp_name'];
        $image_path = $folder . $image_file;
        $game_path = $folder . $game_file;
        $image_target_file = $folder . basename($image_file);
        $game_target_file = $folder . basename($game_file);
        $imageFileType = pathinfo($image_target_file, PATHINFO_EXTENSION);
        $gameFileType = pathinfo($game_target_file, PATHINFO_EXTENSION);

        // Allow only JPG, JPEG, PNG & GIF etc formats for image
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed for image';
        }

        // Allow only ZIP, RAR, 7Z, and TAR.GZ formats for game file
        if (
            $gameFileType != "zip" && $gameFileType != "rar" && $gameFileType != "7z"
            && $gameFileType != "tar" && $gameFileType != "gz"
        ) {
            $error[] = 'Sorry, only ZIP, RAR, 7Z, and TAR.GZ files are allowed for game file';
        }

        // Set image upload size 
        if ($_FILES["image"]["size"] > 10000000) {
            $error[] = 'Sorry, your image is too large. Upload less than 10 MB in size.';
        }

        // Set game upload size
        if ($_FILES["game"]["size"] > 5000000000000) {
            $error[] = 'Sorry, your game file is too large. Upload less than 50 MB in size.';
        }

        if (!isset($error)) {
            move_uploaded_file($image_file_tmp, $image_target_file);
            move_uploaded_file($game_file_tmp, $game_target_file);
            $result = mysqli_query($db, "INSERT INTO game (image, game, title) VALUES('$image_file', '$game_file', '$title')");
            if ($result) {
                $success_message = 'Image and game file uploaded successfully!';
                header("Location: displaygame.php");
            } else {
                $error_message = 'Something went wrong';
            }
        }
    }

    if (isset($error)) {
        foreach ($error as $error) {
            echo '<div class="message error">' . $error . '</div>';
        }
    }

    if (isset($success_message)) {
        echo '<div class="message success">' . $success_message . '</div>';
    }

    ?>



<div class="container">
        <div class="box form-box">
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
                    <label for="title">Select File</label>
                    <input type="file" name="game">
                </div>
                <div class="field input">
                    <label for="title">Description</label>
                    <input type="text" name="title" id="username" autocomplete="off" required>
                </div>
                <div class="field">

                    <input type="submit" class="select-image" name="form_submit" value="Upload" a href="displaygame.php" required></a>



                    <script src="game.js"></script>
            </form>
        </div>
    </div>
    </div>

</body>

</html>