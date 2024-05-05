<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>video upload php and mysql</title>
	<link rel="stylesheet" href="vid.css">
	
	
</head>
<body>
<div class="container">
        <div class="box form-box">
		<header>Upload Videos</header>
	<?php if (isset($_GET['error'])) {  ?>
		<p><?=$_GET['error']?></p>
	<?php } ?>
	 <form action="videoupload.php"method="post"enctype="multipart/form-data">
	 <div class="field input">
                    <label for="title">Select a video</label>
                    <input type="file" class="file" name="my_video" required>
                </div>
	<div class="field input">
    <label for="title">Description</label>
    <input type="text" name="title" id="title">
	</div>
	<div class="field">
	<input type="submit"name="submit" class="select-image" value="Upload">
	 </form>
	</div>
	</div>
	</div>
</body>
</html>