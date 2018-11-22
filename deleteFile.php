<?php

 	$servername = "localhost";
    $username = 'root';
    $password = '';
    $db = 'resume_builder';
    $conn = new mysqli($servername, $username, $password,$db);
    $row = $_POST['deleteRow'];
   	$query = "DELETE FROM `resumes` WHERE filename=\"".$row['filename']."\""; 
    $result = $conn->query($query);
    $filepath = "./templates/user_resumes/".$row['filename'];
    unlink($filepath);
?>