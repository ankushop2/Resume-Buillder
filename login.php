<?php
$result="";
ini_set('display_errors', 1);
session_start();
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = 'root';
    $password = '';
    $db = 'resume_builder';
    $conn = new mysqli($servername, $username, $password,$db);

    //Create Local Variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION["loggedin"] = $username;
    $query = "SELECT user_id FROM login WHERE username = '$username' AND password = '$password' ";
    $result = $conn->query($query);
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {	
          $row = mysqli_fetch_array($result);
          $_SESSION['u_id'] = $row['user_id'];
          header("location: home.php");
    } 
    else {
          $result='<div class="alert alert-danger"><strong>Invalid USER</strong></div>';
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

  <!-- CSS  -->
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
<body class="grey darken-2">
  <nav role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" style="color:white;">WELCOME</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="create_account.php" style="color:white;"><strong>CREATE ACCOUNT</strong></a></li>
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
  			<div class="card-action lighten-1 while-text" style="background-color:#00bfa5 ;">
  				<h4 align="center" style="color:white;">ENTER LOGIN DETAILS</h4>
          		<?php echo $result; ?>
  			</div>
  			<div class="card-content">
          <form method="post">
    				<div class = "form-field">
    					<label>Username</label>
    					<input type="text" name="username" />
    				</div>
    				<div class = "form-field">
    					<label>Password</label>
    					<input type="password" name="password" />
    				</div>
    				<div class = "form-field">
                  <input type="submit" name="submit" class="btn btnn waves-effect waves-light" value="LOGIN"></input>
            </div>
          </form>
  			</div>
  		</div>
  	</div>
  </div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
