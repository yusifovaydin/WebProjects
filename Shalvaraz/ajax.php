<?php 
include("mysql.php");
$netice = $_POST["deyer"];
if($netice){
	$db = new PDO($pdo,$usern,$userp);
	$res = $db->prepare("SELECT * FROM tablo where ad like ?");
	$res->execute(array("%".$netice."%"));
	$show = $res->fetchAll(PDO::FETCH_ASSOC);
	$x = $res->rowCount();
	
	if($x){
		foreach($show as $alldata){
		$ad = $alldata["ad"];
		echo $ad."<br>";
		}
	}else{
		echo "bir netice yoxdur...";
	}
	
}else{
	echo "";
}
?>