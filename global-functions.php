<?php

//==== Global Variables Declaration =====//

//=== DB Variables
$strDBServer = "localhost";
$strDBName = "designpanel";
$strDBUser = "root";
$strDBPass = "spdythnkr";
$objCon;
//define ("MAX_SIZE","1048576");

//=== init_set declaration
ini_set('SMTP','localhost'); 
ini_set('sendmail_from', 'admin@dgmindia.in'); 

//=== set error handler
set_error_handler("customError");

try 
{
	//== SQL Server Connection
	//$objCon = new PDO("sqlsrv:server=$strDBServer; Database=$strDBName", $strDBUser, $strDBPass);
	//$objCon->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
	
	//== MySQL Connection
	$objCon = new PDO("mysql:host=$strDBServer; dbname=$strDBName", $strDBUser, $strDBPass);
}
catch( PDOException $e ) 
{
	die( "Error connecting to Database" . $e ); 
}


//==== Global Functions Declaration =====//

//=== Error Handler function
function customError($errno, $errstr)
{
	echo "<b>Error:</b> [$errno] $errstr";
	//fncSendErrorMail("<b>Error:</b> [$errno] $errstr");
}

function fncSendMail($from, $to, $cc, $bcc, $subject, $body)
{
	if ($from == "")
	{
		$from = "admin@dgmindia.in";
	}

	if ($bcc != "")
	{
		$bcc = $bcc . ", shandhamankar@gmail.com";
	}
	else
	{
		$bcc = "shandhamankar@gmail.com";
	}
	
	//=== To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	//=== Additional headers
	//$headers .= 'To:' . "\r\n";
	//$headers .= 'From:' . $from . "\r\n";
	
	if($cc != "")
	{
		$headers .= 'Cc: ' . $cc . "\r\n";
	}	
	$headers .= 'Bcc: ' . $bcc . "\r\n";

	mail($to,$subject,$body,$headers);
}

function fncSendErrorMail($strErrMsg)
{
	//=== To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	//=== Additional headers
	//$headers .= 'To:' . "\r\n";
	//$headers .= 'From: admin@dgmindia.in' . "\r\n";
	$to = "patil.govind@gmail.com";
	$subject = "Error Occured in DGMIndia.in";
	$body = "Below error occured in DGMIndia.in website:<br><br>" . $strErrMsg;

	mail($to,$subject,$body,$headers);
}


/*
function getStateName($id){
	
	$objCon = mysql_connect($strDBServer, $strDBUser, $strDBPass);
	mysql_select_db("dgminweb", $objCon);

	$strSQL="SELECT state_name FROM tbl_state_master WHERE state_id = " . $id;
	//echo $strSQL;
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result))
	{
		$strStateName = $row['state_name'];
	}
	return $strStateName;
}

function getCityName($id){

	$objCon = mysql_connect($strDBServer, $strDBUser, $strDBPass);
	mysql_select_db("dgminweb", $objCon);

	$strSQL="SELECT city_name FROM tbl_city_master WHERE city_id = " . $id;
	//echo $strSQL;
	$result = mysql_query($strSQL);
	while($row = mysql_fetch_array($result))
	{
		$strCityName = $row['city_name'];
	}
	return $strCityName;
}
*/

function getExtension($str) 
{
	$i = strrpos($str,".");
	if (!$i) { return ""; } 

	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	return $ext;
}

function fncCreateThumb($strUploadedThumbFileName, $uploadedthumbfile, $thumbWidth){

	$strError = "";

	$filename = str_replace("'", "’", stripslashes($strUploadedThumbFileName));
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) 
	{
		$strError+= ' Unknown Image extension ';
		$errors=1;
	}
	else
	{
		//$size=filesize($uploadedthumbfile);
		
		/*
        if ($size > MAX_SIZE)
		{
			$strError+= "You have exceeded the size limit";
			$errors=1;
		}
        */

		if($extension=="jpg" || $extension=="jpeg" )
		{
			$uploadedfile = $uploadedthumbfile;
			$src = imagecreatefromjpeg($uploadedfile);
		}
		else if($extension=="png")
		{
			$uploadedfile = $uploadedthumbfile;
			$src = imagecreatefrompng($uploadedfile);
		}
		else 
		{
			$src = imagecreatefromgif($uploadedfile);
		}
		
		list($width,$height)=getimagesize($uploadedfile);

		$newwidth=$width;
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		
        //=== Give custom width/height here if required in gallery like pages.
		//$newwidth1=170;
		//$newheight1=108;

        //=== below for getting proportionate height of the image with respect to provided width = $thumbWidth
        $newwidth1 = $thumbWidth;
        $newheight1 = floor( $newheight * ( $thumbWidth / $newwidth ) );

		$tmp1=imagecreatetruecolor($newwidth1,$newheight1);

		//imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight, $width,$height);

		imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, $width,$height);

		//$filename = "images/gallery/cat_".$strCatID."/". str_replace("'", "’", $strUploadedThumbFileName);
		$filename1 = "uploaded-designs/thumb_" . $strUploadedThumbFileName;

		//imagejpeg($tmp,$filename,100);
		imagejpeg($tmp1,$filename1,100);

		imagedestroy($src);
		imagedestroy($tmp);
		imagedestroy($tmp1);

		//If no errors registred, print the success message
		if(trim($strError)=="") 
		{
			// mysql_query("update SQL statement ");
			//echo "Image Uploaded Successfully!";
			return $filename1;
		}
		else
		{
			return false;
		}
	}

}

/*
function make_thumb($src, $dest, $desired_width) {

	//=== read the source image 
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	//=== find the "desired height" of this thumbnail, relative to the desired width  
	$desired_height = floor($height * ($desired_width / $width));
	
	//=== create a new, "virtual" image 
	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
	
	//=== copy source image at a resized size 
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
	
	//=== create the physical thumbnail image to its destination 
	imagejpeg($virtual_image, $dest);
}
*/

//=======================================//


?>