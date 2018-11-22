<?php
    session_start();
    $servername = "localhost";
    $username = 'root';
    $password = '';
    $db = 'resume_builder';
    $conn = new mysqli($servername, $username, $password,$db);
    $user_id = $_SESSION["u_id"];
    $query = "SELECT * FROM `resumes` WHERE user_id=\"".$user_id."\""; 
    $result = $conn->query($query);
?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Professional Résumé Builder</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <style>
    	nav {
          background-image: linear-gradient(to right, #00bfa5 , #18ffff);
    	}

    	h2 {
          background: -webkit-linear-gradient(left top, red, yellow);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
      }
      	
  </style>
  <script type="text/javascript">
    function editFunc(row) {
      // body...
     //var x = JSON.parse(row);
     //console.log(row);
    $.ajax({
      url: 'editFile.php',
      type: 'POST',
      data: {editRow:row},
      success: function(msg) {
          alert(msg);
      }
    });


    }
  </script>
   <script type="text/javascript">
    function deleteFunc(row) {
     if (confirm("Are you sure you want to delete this record?")) {
    $.ajax({
      url: 'deleteFile.php',
      type: 'POST',
      data: {deleteRow:row},
      success: function(msg) {
          //alert(msg);
          location.reload();
      }
    });

  }
    }
  </script>
  <script language="javascript" type="text/javascript">
    function try1() {
       $("#theform").submit();
    }
</script>
</head>
<body class="grey darken-2">

  <nav role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="home.php" class="brand-logo" style="font-size: 150%;">Résumé Builder</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home.php">Templates</a></li>
				<li><a href="#">Logout</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav teal accent-4">
        <li><a href="home.php">Templates</a></li>
				<li><a href="#">Logout</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

	<center><h2>My Résumés</h2></center>
  <form action="editFile.php" method="POST" id="theform">
     	
<div class="container">
      <div class="section ">
       <table class="centered">
        <thead>
          <tr>
              <th>Name</th>
              <th>Resume Name</th>
              <th>Date Modified</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $x=1;
       while($row =  mysqli_fetch_array($result)) {
                  echo '<tr>
                            <td bgcolor=" #5dade2 "scope="row">' . $x++ .'</td>
                            <td bgcolor=" #5dade2 "scope="row">' . ucfirst($row["resume_name"]) .'</td>
                            <td bgcolor=" #5dade2 "scope="row">' . $row["date"] .'</td>
                            <td bgcolor=" #5dade2 "scope="row"><input type=\'hidden\' name=\'row\' value="'.htmlentities(serialize($row)).'"><a class="waves-effect waves-light btn green" style="margin-right: 1em;" onclick=try1()>Edit</a></input><a class="waves-effect waves-light btn red" onclick = deleteFunc('.json_encode($row).')>Delete</a></td>
                        </tr>';
            }
            ?>
        </tbody>
      </table>
    </div>  
	</div>
</form>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  
	<script>
		
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });
	</script>
  
  </body>
</html>
