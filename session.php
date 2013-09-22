<?php
session_start();
check_session();

function check_session(){

	if(!isset($_SESSION["userid"]))
	{
		session_destroy();
		header("Location: index.php?err=4");
	}
}
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
