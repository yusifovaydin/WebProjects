<?php 
$userid = $_SESSION["id"];
$postid = $_GET["id"];
include("../mysql.php");
$tbname = "tablo";

$db = new mysqli($host,$username,$pass,$dbname);
$data = $db->query("SELECT * FROM tablo WHERE id ='$postid' LIMIT 1");
foreach($data as $alldata){
	$imgloc = $alldata["sekil_adi"];
	$userpostid = $alldata["user_id"];
}
if($userid){
	if($_GET){
		if(!empty($userpostid)){
			if($userid == $userpostid){
				$db->query("delete from tablo where id='$postid'");
				@unlink("../".$imgloc);
				 echo "<script> window.location.replace('./') </script>";
			}else{
				echo "Bu postu sen sile bilmezsen!";
			}
		}else{
			 echo "<script> window.location.replace('./') </script>";
		}
	}else{
		echo "Bele sehife tapilmadi";
	}
}else{
		header("location:../login/");
}


?>