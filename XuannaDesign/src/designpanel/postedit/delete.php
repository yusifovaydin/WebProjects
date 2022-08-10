<?php

$imgway = $_POST["imgway"];
$imgcnt = $sekilsayi = substr_count( $imgway, ";" ) + 1;
$sekilarray = explode( ";", $imgway);

include("../../../server.php");
$db = new mysqli($host,$usern,$userp,$dbname);

$db->query("delete from products where photoway='$imgway'");

for($i=0;$i<$imgcnt;$i++){
unlink("../../../".$sekilarray[$i]);
}

header("Refresh:1;url=./");


?>