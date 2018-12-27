<?php
  session_start();
?>
<?php
  error_reporting(E_ALL);
  ini_set( 'display_errors','1');

  $log_username = $_POST['username'];
  $log_password = $_POST['password'];
  include_once 'database.php';

  $squery = "SELECT acc_login, acc_password FROM tbl_accounts";

  $conn = new mysqli($db_servername,$db_username,$db_password,$db_name);

  if ( mysqli_connect_errno() ) {
    echo  die("Could not connect to database </body></html>" );
  } else {
    $result = mysqli_query($conn, $squery);
  }
  $valid_login = false;

  // checks whether login is valid
  while ($row = mysqli_fetch_row($result)) {
    if (($row[0]==$log_username) && ($row[1]==sha1($log_password))) {
      $_SESSION['user'] = $log_username;
      $_SESSION['password'] = $log_password;
      $valid_login = true;
    }
  }
  if ($valid_login) {
    header('Location: events.php', true, 301);
  } else {
    header('Location: login.php', true, 301);
  }
  mysqli_close($conn);
?>
