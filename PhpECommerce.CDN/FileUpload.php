<?php

/**
 * FileUpload short summary.
 *
 * FileUpload description.
 *
 * @version 1.0
 * @author dogan
 */

function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);
        $uuid = chr(123)
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);
        $uuid= str_replace("{","",$uuid);
        $uuid=str_replace("}","",$uuid);
        return $uuid;
    }
}

function upload(){
    
    $filePath="files/".$_POST["AppID"]."/".$_POST["Content"]."/".$_POST["FileType"];

    if (!file_exists($filePath))
    {
        $results= mkdir($filePath,0777,true);
    }
    $strFile=array();
    $index=0;
    foreach ($_FILES["image"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["image"]["tmp_name"][$key];
            $name = getGUID().".".pathinfo($_FILES["image"]["name"][$key], PATHINFO_EXTENSION); //$_FILES["image"]["name"][$key];
            $result = move_uploaded_file($tmp_name, $filePath."/$name");
            if ($result)
            {
                $strFile[$index]=$filePath."/$name";
                $index++;
            }
        }
    }
    return $strFile;
}
header('Content-Type: application/json');
header("Access-Control-Allow-Origin:*");
echo json_encode(upload());





?>
