<?php
  session_start();
  error_reporting(E_ALL);
  ini_set( 'display_errors','1');
  include_once 'database.php';
  if(isset($_POST['sort_m'])){
    $sort_by = $_POST['sort_m'];
  } else {
    $sort_by = "event_name";
  }
  // sort by whatever radio button is selected
  // sorts by event_name default
  $squery = "SELECT * FROM tbl_events ORDER BY " . $sort_by;

  $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);

  if ( mysqli_connect_errno() ) {
    echo  die("Could not connect to database </body></html>" );
  } else {
    $result = mysqli_query($conn, $squery);
  }
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
       	<div id="navdiv" class="container-fluid">
        	<ul id="navigation" class="nav navbar-nav">
            <li><a href="events.php"><b>Events Page</b></a></li>
	          <li><a href="logout.php"><b>Logout</b></a></li>
        	</ul>
      	</div>
  		</nav>
    <br><br>
    <div class="container">
        <?php
          // shows current user
          echo "<h3>Calendar for user: <span style='color: red'>" . $_SESSION['user'] . "</span></h3>";
        ?>
    		<table class="table" id="eventTable">
          <thead>
            <tr>
              <th scope="col">Event Name</th>
              <th scope="col">Location</th>
              <th scope="col">Date</th>
            </tr>
            <?php
              // populates the table with events from mysql server
              while ($row = mysqli_fetch_row($result)) {
                echo "<tr>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "</tr>";
              }
            ?>
          </thead>
          <tbody>
          </tbody>
    		</table>
        <div>
          <form name = "sort" method='post' action=''>
            <input id="event_name" class="trigger" type="radio" value="event_name" name='sort_m' onclick="this.form.submit()"> Event Name
            <input id="event_location" class="trigger" type="radio" value="event_location" name='sort_m' onclick="this.form.submit()"> Event Location
            <input id="event_date" class="trigger" type="radio" value="event_date" name='sort_m' onclick="this.form.submit()"> Event Time
          </form>
          <p id=myDiv></p>
          <script type="text/javascript">
            document.getElementById("<?php echo $sort_by ?>").checked = true;
          </script>
        </div>
  		</div>
    <?php
      // if user session isn't started, route back to login page
      if ( isset($_SESSION['user']) && isset($_SESSION['password']) ) {

      }
      else {
        header('Location:login.php');
      }
    ?>
  </body>
</html>
