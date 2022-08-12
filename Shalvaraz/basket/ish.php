<?php 
session_start();
if($_POST){
	$postid=$_POST["id"];
	if(isset($_POST["ish"])){
		if($_POST["ish"] === "add"){
			if(isset($_SESSION["sebet"])){
				$listid = array_column($_SESSION["sebet"],"mehsulid");
				$is2=$_POST["id"];
				$is = $is2;
				$isi=intval($is2);
				
				if(!in_array($_POST["id"],$listid)){
					$say = count($_SESSION["sebet"]);
					$add = [
						"mehsulid" => $_POST["id"],
						"mehsulad" => $_POST["ad"],
						"mehsulqiymet" => $_POST["qiymet"],
						"mehsulolcu" => $_POST["olcu"],
						"sekil"    => $_POST["sekil"]
					];
					$_SESSION["sebet"][$say] = $add;
					$_SESSION["sebetsayi"] = $say+1;
					header("location:../moredetail.php?id=$postid");
				}else{			
 					header("location:../moredetail.php?id=$postid");
				}
			}else{
				$add = [
					"mehsulid" => $_POST["id"],
					"mehsulad" => $_POST["ad"],
					"mehsulqiymet" => $_POST["qiymet"],
					"mehsulolcu" => $_POST["olcu"],
					"sekil"    => $_POST["sekil"]
				];
				$_SESSION["sebet"][0] = $add;
				$_SESSION["sebetsayi"] = 1;
 				header("location:../moredetail.php?id=$postid");
			}
		}else if($_POST["ish"] == "sil"){
			foreach($_SESSION["sebet"] as $key => $value){
				if($_POST["id"] == $value["mehsulid"]){
					unset($_SESSION["sebet"][$key]);
					$_SESSION["sebetsayi"] = $_SESSION["sebetsayi"] - 1;
					header("location:./");
					
				}
			}
		}
	}else{
		echo "Bele bir sehife yoxdur";
	}
}else{
	echo "POST YOXDUR";
}
	
?>