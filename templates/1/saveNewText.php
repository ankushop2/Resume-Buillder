<?php 
	ini_set('display_errors', 1);
	session_start();
	$u_id = $_SESSION["u_id"];
	$servername = "localhost";
    $username = 'root';
    $password = 'root123';
    $db = 'resume_builder';
    $conn = new mysqli($servername, $username, $password,$db);
    $resume_name = $_SESSION['template_name'];
    $query  = 'SELECT max(resume_id) as resume_id FROM `resumes`';
    $result = $conn->query($query);
    if(mysqli_num_rows($result) != 0) {
      $row = mysqli_fetch_array($result);
      $maxID = $row['resume_id'];
      $newID = $maxID + 1;
    }
    else
      $newID = 100; 
    $date = date("Y-m-d");
    $time = date("h-i-s");
    $fileName =(string)($u_id) . "_" . $resume_name . "_" . (string)($date) ."_".(string)($time). ".html";
    
    $myfile = fopen($fileName, "w") or die("Unable to open file!");
    $newText = $_POST["newText"];
    fwrite($myfile, $newText);
    fclose($myfile);
    $query = "INSERT INTO resumes(resume_id,user_id,resume_name,`date`,filename) VALUES('$newID','$u_id','$resume_name','$date','$fileName')";
    echo $query;
    $result = $conn->query($query);
    if(!$result) {
       echo "Not Success";
    }
    else {
        echo "Success";
    }
?>