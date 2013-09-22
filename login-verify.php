<?php 

$intUID = $_REQUEST["uid"];
$strName = $_REQUEST["uname"];

/*
$strSQL = "SELECT a_user_id, a_user_first_name, a_user_last_name FROM tbl_admin_users WHERE a_user_id = ".$intUID;

$objResult = $objCon->query($strSQL);

if($objResult)
{
	while($aryRow = $objResult->fetch(PDO::FETCH_ASSOC))
	{
		$intUserID = $aryRow['a_user_id'];
		$strFirstName = $aryRow['a_user_first_name'];
		$strLastName = $aryRow['a_user_last_name'];
		$i=$i+1;
	}
    */

    //=== start the session
    session_start();

    //=== assigning values to sessions
    $_SESSION["userid"] = $intUID;
    $_SESSION["username"] = $strName;

    //echo $_SESSION["uid"];
    //echo $_SESSION["uname"];
    //exit();

    header("Location: projects.php");
    /*
}
else
{
    header("Location: index.php");
}
*/




?>