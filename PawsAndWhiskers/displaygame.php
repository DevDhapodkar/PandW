<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Display Images</title>
    <style>
        body {
            background-color: #121212;
            color: white;
            margin-top: 90px;
        }

        /* Navbar styles */
        .navbar {

            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100;
            background-color: #121212;
            color: #fff;
            padding: 0.5rem 1rem;
            font-size: 1.0rem;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: absolute;
            top: 50%;
            left: 50px;
            transform: translateY(-50%);
        }

        .navbar-nav {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100%;
            margin-right: 10px;
            margin-top: 5px;
        }

        .nav-link {
            position: relative;
            color: #fff;
            margin: 0 10px;
            font-size: 1.2rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            height: 2px;
            width: 0%;
            background-color: #fed086;
            transition: all 0.3s ease-in-out;
        }

        .bg-dark {
            background-color: #121212 !important;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
        }

        .nav-link:hover::before {
            width: 100%;
        }

        .nav-link:hover {
            color: #fed086;
        }

        .navbar-button button {
            background-color: #121212;
            color: #fff;
            border: 2px solid #fed086;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.3);
            cursor: pointer;
            animation: button-animation 1s ease-in-out ;
        }

       .navbar-button button:hover{
        color:#121212;
        background-color: #fed086;
        transition: 1s;
        font-weight: 600;
       }
        .card {
            background-color: #252525;
            border-radius: 10px;
            transition: all 0.2s ease-in-out;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .download-btn {
            font-size: 0.8rem;
            background-color: #fed086;
            border: none;
            border-radius: 10px;
            padding: 0.5rem;
            margin-right: 1rem;
            transition: all 0.2s ease-in-out;
            font-weight: 500;
        }

        .download-btn:hover {
            background-color: #9c6fd9;
            cursor: pointer;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> Paws And Whiskers</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="gamingnews.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.html"> News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="displaygame.php">Shop Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php">Guides</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="displayimage.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Contact us</a>
                    </li>
                    <div class="navbar-button">
                        <button type="button" onclick="location.href='upload.php'">Upload </button>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Fetch images from database
    $result = mysqli_query($db, "SELECT* from game ORDER by id DESC");

    // Display images in card layout
    echo '<div class="container">';
    echo '<div class="row row-cols-1 row-cols-md-3 g-4">';

    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="col">';
        echo '<div class="card h-100">';
        echo '<img src="uploads/' . $row['image'] . '" class="card-img-top" class="img">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['title'] . '</h5>';
        echo '<a href="uploads/' . $row['game'] . '" download><button class="btn download-btn">Download</button></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>