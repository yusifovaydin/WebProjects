<?php

$id = $_GET["id"];

$select = $db->prepare("select * from endirim where id=?");
$select->execute(array($id));
$tap = $select->fetch(PDO::FETCH_ASSOC);

//echo $tap["sekil_adi"];

unlink($tap["sekil_adi"]);

$sil = $db->prepare("delete from endirim where id=?");
$ok = $sil->execute(array($id));

if($ok){
	echo "<h2>Gonderi Silindi...";
	header("refresh: 2; url=index.php");
	}else{
	echo "<h2>Gonderi Silinmedi...";
	}

?>