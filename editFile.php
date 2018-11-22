<?php
	ini_set('display_errors', 1);
	$passed_array = unserialize($_POST['row']);
	$filenamePost = $passed_array['filename'];
	$filename = "templates/user_resumes/".$filenamePost;
	echo "<script>window.open('$filename','_self');</script>";

?>