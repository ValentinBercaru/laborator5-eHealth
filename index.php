<?php
  session_start();
  $conn = mysqli_connect('localhost', 'root', '', 'ehealth');
?>

<?php
  if (isset($_SESSION['email'])) {
    $user_data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `utilizatori` WHERE `email` = '".$_SESSION['email']."'"));

    if ($user_data['account_type'] == 1) {
      echo 'Welcome admin! <a href="logout.php">Logout</a>';
    } else {
      echo 'Welcome regular member! <a href="logout.php">Logout</a>';
    }
  } else {
    echo 'Please <a href="login.php">login</a> in order to see this page properly.';
  }
?>
