<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
// session_start();
$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Insert content into blogs table
function add_friend($userId) {

    $result = db_query("INSERT INTO friendcircle_users (circleId, userId) VALUES (".$_SESSION['circleId'].", ".db_quote($userId).")");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        header("Location: /".$_SESSION['username']."/circles/".$_SESSION['circleId']);
        exit();


    }

}


add_friend($_POST['userId']);

?>

<!-- <br>
<form action="../../circles" method="post">
    <input type="submit" value="Back to friends in circle">
</form>
 -->