<?php

include "../global-functions.php";
$i=0;
$strFirstName="";
$strLastName="";
$strUserName = $_REQUEST["username"];
$strUserPass = $_REQUEST["userpass"];
$strSQL = "SELECT a_user_id, a_user_first_name, a_user_last_name FROM tbl_admin_users WHERE a_user_name = '".$strUserName."' and a_user_pass = '".$strUserPass."' and a_user_status=1";

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

	$userdetails = array(
		"uid" => $intUserID,
		"uname" => $strFirstName . " " . $strLastName,
	);

}

echo json_encode($userdetails);

?>