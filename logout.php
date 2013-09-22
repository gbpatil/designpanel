<?php

session_start();
//=== destroy all session variable at once
$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
    </body>
</html>

<?php 
// sleep for 10 seconds
//sleep(10);
header("Location: login.php?err=3");
?>
