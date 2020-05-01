<?php

/**
 * GetFile short summary.
 *
 * GetFile description.
 *
 * @version 1.0
 * @author dogan
 */

header('Content-Type: image/png');
$filePath=$_GET["FilePath"];
$fp =resize_image($filePath,$_GET["w"],$_GET["h"]);
imagejpeg($fp, null, 100);
exit;

function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $newwidth = $w;
    $newheight = $h;

    if ($w==0)
    {
        $newwidth=$width;
    }
    if ($h==0)
    {
        $newheight=$height;
    }
    $src =imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    $requestImgWidth=$newwidth;
    $requestImgHeight=$newheight;

    
    if($height>$width){
        $r=$newheight/$height;
        $newwidth=$r*$width;
    }else{
        $r=$newwidth/$width;
        $newheight=$r*$height;
    }

    imagesavealpha($dst, true);
    $color = imagecolorallocatealpha($dst, 255, 255,255, 127);
    imagefill($dst, 0, 0, $color);
    imagecopyresampled($dst, $src,($requestImgWidth-$newwidth) / 2,($requestImgHeight-$newheight) / 2,0,0, $newwidth,$newheight, $width, $height);
    
    return $dst;
}

?>