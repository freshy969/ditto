<?php

  require (dirname(__FILE__) . '/../../../resources/db/db_connect.php');
  require (dirname(__FILE__) . '/../../../resources/db/db_query.php');

  session_start();
  /*
   Inserts a new user into the database
  */
  function newUser() {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $mobileNumber = $_POST['mobileNumber'];
    $dob = $_POST['dob'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // insert into db
    $query = "INSERT INTO `users` (`fName`, `lName`, `email`, `username`, `hashedPassword`, `mobileNumber`, `dob`) VALUES ('$fName', '$lName', '$email', '$username', '$password', '$mobileNumber', '$dob')";
    $result = db_query($query);

    if ($result === false) {
      // echo "insert failure.";
    } else {
      // echo "insert success.";
    }
  }

  /*
   Given an email address this function checks to see if a user already exists,
   if a user does exist it returns `true` otherwise the function returns false.
  */
  function checkUser($email) {

    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_num_rows(db_query($query));

    if ($result === 1) {
      return true;
    } else {
      return false;
    }
  }

  /*
  This function registers a new guser given an email address and returns
  a boolean true if an attempt to create a user was made and false otherwise.
  */
  function register($email) {
    if (checkUser($email) === false) {
      newUser();
      return true;
    } else {
      return false;
    }
  }

function getUserId($email) {
  $result = db_query("SELECT userId FROM `users` WHERE email = '$email'");
  return mysqli_fetch_assoc($result)['userId'];
}

function createAlbum($userId) {
  $query = "INSERT INTO `albums` (userId, albumName) VALUES ('$userId', 'profile')";
  $result = db_query($query);
}

function createFriendCircle($userId) {
  $query = "INSERT INTO `friendcircles` (userId, name) VALUES ('$userId', 'everyone')";
  $result = db_query($query);
}

// If the submit button has been pressed
if (isset($_POST['submit'])) {
  if (register($_POST['email'])) {

    // get the user's id number
    $userId = getUserId($_POST['email']);

    // set the session
    $_SESSION['userId'] = $userId;

    // intialise the user with album and friend circle
    createAlbum($userId);
    createFriendCircle($userId);

    // redirect to the homepage
    header("location: /hatebook/index");

  } else {
    echo "Email address already registered mate.";
  }
}
?>
