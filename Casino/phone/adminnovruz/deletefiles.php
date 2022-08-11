<?php 
$type = $_GET["type"];
$link = $_GET["link"];

include("../../server.php");
$db = new mysqli($host,$uname,$dbpass,$dbname);

switch ($type){
    case "jpg":
        $db->query("DELETE FROM ads WHERE link='$link'");
        unlink($link);
        header("Location:./slideupload.php");
        break;
    case "mp4":
        $db->query("DELETE FROM live WHERE live_link='$link'");
        unlink($link);
        header("Location:./videoupload.php");
        break;    
}
    

?>