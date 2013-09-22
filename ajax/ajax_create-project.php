<?php

include "../global-functions.php";

$strProjectName = $_REQUEST["name"];
$strProjectDesc = $_REQUEST["desc"];

$strSQL = "INSERT INTO tbl_projects (project_name, project_description, project_status) VALUES ('" . $strProjectName . "','" . $strProjectDesc . "', 0)";

$intCount = $objCon->exec($strSQL);

if($intCount == false)
{
	$strMsg = "";	
}
else
{
	$strMsg = "New Project Created";
}

echo $strMsg;

?>