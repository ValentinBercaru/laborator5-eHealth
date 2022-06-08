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
      <input type="submit" value="Login!"><br>
      <a href="register.php">Register</a>
      <a href="index.php">Index page</a>
    </form>
    <?php
      if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $get_user = mysqli_query($conn, "SELECT * FROM utilizatori WHERE `email` = '$email' AND `password` = '$password'");

        if (mysqli_num_rows($get_user) == 0) {
          echo 'Incorrect email or password!';
        } else {
          $_SESSION['email'] = $email;
          header('Location: index.php');
          exit();
        }
      }
    ?>
  </body>
</html>
