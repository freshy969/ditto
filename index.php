<?php
  include("public/php/home/login.php");

  if( isset($_SESSION['login_user']) ){
    header("location: ./public/php/home/home.php");
}
?>

<html>
<body>

  <h1>Login</h1>

  <form action="" method="post">
    <input type="text" name="email" placeholder="email" required><br>
    <input type="text" name="password" placeholder="password" required><br><br>
    <input type="submit" name="submit">
  </form>

</body>
</html>
