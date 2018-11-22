<?php
$result="";
ini_set('display_errors', 1);
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = 'root';
    $password = 'root123';
    $db = 'resume_builder';
    $conn = new mysqli($servername, $username, $password,$db);

    //Create Local Variables
    $name = $_POST['name'];
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $query  = 'SELECT max(user_id) AS user_count FROM `user_details`;';
    $result = $conn->query($query);
    if(mysqli_num_rows($result) != 0) {
      $row = mysqli_fetch_array($result);
      $maxID = $row["user_count"];
      $newID = $maxID + 1;
    }
    else 
      $newID = 14567;

    $query1 = "INSERT INTO user_details(full_name,username,email,password,user_id) VALUES('$name','$username','$email,'$password','$newID')";
    $query2 = "INSERT INTO login(user_id,username,password) VALUES('$newID','$username','$password')";
    $res1 = $conn->query($query1);
    $res2 = $conn->query($query2);
     if ( $res1 && $res2) {
          header("location: index.html");
    } 
    else {
          $result='<div><strong>Record exists</strong></div>';
    }
    $conn->close();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Professional Resume Builder</title>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

  <!-- LOCAL CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
      nav,btnn {
          background-image: linear-gradient(to right, #00bfa5 , #18ffff);
      } 
      h2 {
          background: -webkit-linear-gradient(left top, red, yellow);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
      }
        
  </style>
</head>
<body>
  <nav role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="color:white;">WELCOME</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="login.php" style="color:white;"><strong>SIGN IN</strong></a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav teal accent-4">
        <li><a href="login.php" style="font-size: 110%;color:#eeeeee;"><strong>SIGN IN</strong></a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <br><br><br>
  <div class="row">
  	<div class="col s12 m6 offset-m3">
  		<div class="card">
    			<div class="card-action lighten-1 while-text" style="background-color:#00bfa5;">
    				<h4 align="center">PLEASE ENTER YOUR DETAILS</h4>
            <?php echo $result; ?>
    			</div>
    			<div class="card-content">
            <form method="post">
              <div class = "form-field">
                <label>Full Name</label>
                <input type="text" name="name"/>
              </div>
      				<div class = "form-field">
      					<label>Username</label>
      					<input type="text" name="username"/>
      				</div>
              <div class = "form-field">
                <label>Email - ID</label>
                <input type="email" name="email"/>
              </div>
              <div class = "form-field">
      					<label>Password</label>
      					<input type="password" name="password" />
      				</div>
      				<div class = "form-field">
                <input type="submit" name="submit" class="btn btnn waves-effect waves-light lighten-1" value="CREATE ACCOUNT" />
      				</div>
            </form>
    		  </div>
  		</div>
  	</div>
  </div>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

  <!-- DATEPICKER  -->
  <script >
    const Calender = document.querySelector('.datepicker');
    M.Datepicker.init(Calender,{
        format:'yyyy-mm-dd',
        showClearBtn:true,
    });

  </script>

  <!-- LOCAL JS  -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>