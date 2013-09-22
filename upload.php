<?php

include "global-functions.php";

$file = isset($_FILES['uploadFile']['name']) ? $_FILES['uploadFile'] : '';

$fileArr = explode("." , $file["name"]);

$ext = $fileArr[count($fileArr)-1];

$allowed = array("jpg", "jpeg", "png", "gif", "bmp");

if (in_array($ext, $allowed)){
    move_uploaded_file($file["tmp_name"],"uploaded-designs/".$file["name"]);
    fncCreateThumb($file["name"], "uploaded-designs/".$file["name"], 150);
    
    echo $file["name"];
}
else
{
    echo "invalid";
}

?>