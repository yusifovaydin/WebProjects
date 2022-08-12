<?php
include("../mysql.php");

	try{
		
		$db = new PDO($pdo,$usern,$userp);
		
	}catch (PDOException $mesaj){
		
		echo $mesaj->getMessage();
	}
		
?>