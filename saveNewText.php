<?php 
	ini_set('display_errors', 1);
	session_start();
	$u_id = $_SESSION["u_id"];
	$servername = "localhost";
    $username = 'root';
    $password = '';
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
    $fileNamedB =(string)($u_id) . "_" . $resume_name . "_" . (string)($date) ."_".(string)($time). ".html";
    $filename = "templates\\user_resumes\\".$fileNamedB;
    //echo $fileName;
    if($resume_name == "doppio"){
        $intro_text = file_get_contents("templates/1/intro.html");
        $outro_text = file_get_contents("templates/1/outro.html");  
    }
    else if($resume_name == "vandeco"){
        $intro_text = file_get_contents("templates/2/intro.html");
        $outro_text = file_get_contents("templates/2/outro.html");  
    }
    else if($resume_name == "heavy"){
        $intro_text = file_get_contents("templates/3/intro.html");
        $outro_text = file_get_contents("templates/3/outro.html");  
    }
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    $newText = $_POST["newText"];
    $filetext = $intro_text . $newText . $outro_text;
    fwrite($myfile, $filetext);
    fclose($myfile);
    $query = "INSERT INTO resumes(resume_id,user_id,resume_name,`date`,filename) VALUES('$newID','$u_id','$resume_name','$date','$fileNamedB')";
    echo $query;
    $result = $conn->query($query);
    if(!$result) {
       echo "Not Success";
    }
    else {
        echo "Success";
    }
?>