<?php

include "../global-functions.php";

$strDesignName = $_REQUEST["designname"];
$strDesignDesc = $_REQUEST["designdesc"];
$strDesignImgName = $_REQUEST["imgname"];
$strDesignImgPath = $_REQUEST["imgpath"];
$strDesignThumbName = $_REQUEST["thumbname"];
$strDesignThumbPath = $_REQUEST["thumbpath"];
$strDesignStatus = 1;

$strSQL = "INSERT INTO tbl_designs (design_name, design_desc, design_img_name, design_img_path, design_thumb_name, design_thumb_path, design_add_date, design_status) VALUES 
('" . $strDesignName . "', '" . $strDesignDesc . "', '" . $strDesignImgName . "', '" . $strDesignImgPath . "', '" . $strDesignThumbName . "', '" . $strDesignThumbPath . "', now(), " . $strDesignStatus . ")";

echo $strSQL;

$intCount = $objCon->exec($strSQL);

if($intCount == false)
{
	$strMsg = "";	
}
else
{
	$strMsg = "New design added";
}

echo $strMsg;


?>