<?php require_once("db_conn.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <title>Display Videos</title>
    <style>
        body {
            background-color: #121212;
            color: white;
            margin-top: 70px;
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
            background-color: #b286fe;
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
            color: #b286fe;
        }

        .navbar-button button {
            background-color: #121212;
            color: #fff;
            border: 2px solid #b286fe;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.3);
            cursor: pointer;
            animation: button-animation 1s ease-in-out ;
        }

       .navbar-button button:hover{
        color:#121212;
        background-color: #b286fe;
        transition: 1s;
        font-weight: 600;
       }
        .card {
            background-color: #252525;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card-title {
            margin-bottom: 0;
            display: inline-block;
            vertical-align: middle;
        }

        .card-body {
            padding: 1rem;
            text-align: left;
        }

        .btn-download {
            color: #fff;
            background-color: #b286fe;
            border-radius: 10px;
            font-size: 0.8rem;
            padding: 0.3rem 0.5rem;
            transition: all 0.3s;
            float: right;
            margin-left: auto;
			margin-top: 10px;
        }

        .btn-download:hover {
            background-color: #a17df6;
            transform: scale(1.1);
        }

        .card-img-top {
            height: 12rem;
            object-fit: cover;
        }
        
        .btn-sm {
            font-size: 0.8rem;
            padding: 0.2rem 0.5rem;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gamers Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                        <a class="nav-link" href="gamingnews.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.html">Tech News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="displaygame.php">Games</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="displayimage.php">Images</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="feedback.php">Contact us</a>
                    </li>
                    <div class="navbar-button">
                        <button type="button" onclick="location.href='form.php'">Upload Videos</button>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <?php 
        $sql = "SELECT * FROM videos ORDER BY id DESC";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            echo '<div class="container">';
            echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
            while ($video = mysqli_fetch_assoc($res)) { 
    ?>

                <div class="col">
                    <div class="card h-100">
                        <video class="card-img-top" src="uploads/<?php echo $video['video_url'];?>" controls></video>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $video['title'];?></h5>
                            <a href="downloadvideo.php?id=<?php echo $video['id']; ?>" class="btn btn-download">Download</a>
                        </div>
                    </div>
                </div>
                
            <?php } 
            echo '</div>';
            echo '</div>';
        } else {
            echo "No videos found in the database.";
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
