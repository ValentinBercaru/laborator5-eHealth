<?php
  session_start();
  $conn = mysqli_connect('localhost', 'root', '', 'ehealth');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Laborator 5 e-Health</title>
  </head>
  <body>
    <form action="" method="post">
      <input type="text" name="email" placeholder="Email">
      <input type="password" name="password" placeholder="Password">
      <select name="account_type">
        <option value="1">Admin</option>
        <option value="0">Regular user</option>
      </select>
      <input type="submit" value="Register">
    </form>
    <a href="login.php">Login</a>
    <a href="index.php">Index page</a>
    <?php
      if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $account_type = $_POST['account_type'];

        if (empty($email) || empty($password)) {
          echo 'Please fill all the fields!';
        } else {
          $get_user = mysqli_query($conn, "SELECT * FROM utilizatori WHERE `email` = '$email'");
          if (mysqli_num_rows($get_user) > 0) {
            echo 'User already registered!';
          } else {
            // register user
            $sql = mysqli_query($conn, "INSERT INTO `utilizatori` (email, password, account_type, datetime) VALUES ('$email', '$password', '$account_type', NOW())");

            if (!$sql) {
              echo 'Please try again later!';
            } else {
              echo 'Successfully registered!';
            }
          }
        }
      }
    ?>
  </body>
</html>
