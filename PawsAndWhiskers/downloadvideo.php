<?php
require_once("db_conn.php");

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM videos WHERE id = '$id'";
	$res = mysqli_query($conn, $sql);

	if(mysqli_num_rows($res) == 1) {
		$video = mysqli_fetch_assoc($res);
		$video_path = "uploads/" . $video['video_url'];

		if(file_exists($video_path)) {
			// Set headers
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($video_path));
			header('Content-Length: ' . filesize($video_path));

			// Send file
			readfile($video_path);
			exit;
		} else {
			echo "File not found.";
		}
	}
}
