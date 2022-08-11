<?php
include("../../server.php");
$db = new mysqli($host,$uname,$dbpass,$dbname);
$id = $_POST["id"];
echo $id;?><br><br><?php

$user = $db->query("delete from users WHERE id ='$id' ");

header("Location: ./");

?>