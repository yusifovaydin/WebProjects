<?php
include("../../server.php");
$db = new mysqli($host,$uname,$dbpass,$dbname);
$id = $_POST["id"];
echo $id;?><br><br><?php

$user = $db->query("update users set confrim = 1 WHERE id ='$id' ");

$dat = $db->query("SELECT * from users where id='$id'");
foreach($dat as $alldata){
    echo $alldata["confrim"];
}
?>