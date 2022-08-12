<?php 
include("../mysql.php");
$db = new mysqli($host,$usern,$userp,$dbname);
$id = $_SESSION["id"];
$data = $db->query("SELECT * FROM tablo where user_id='$id' and share = 1");
foreach($data as $po){
	$check = $po["ad"];
}
$user = $db->query("SELECT * FROM istifadeciler where uzv_id='$id'");
foreach($user as $userinfo){
	$sifre = $userinfo["uzv_sifre"];
	$uzvadi = $userinfo["uzv_adi"];
}
$_SESSION["ad"] = $uzvadi;
if($_POST){
	$ad = $_POST["name"];
	$mail = $_POST["email"];
	$pass = $_POST["pass"];
	if($pass == $sifre){
		if(empty($mail) && !empty($ad)){
			$db->query("UPDATE istifadeciler SET uzv_adi='$ad' where uzv_id='$id'");
			$_SESSION["ad"] = $ad;
		}else if(!empty($mail) && empty($ad)){
			$db->query("UPDATE istifadeciler SET uzv_mail='$mail' where uzv_id='$id'");
		}else if(!empty($mail) && !empty($ad)){
			$db->query("UPDATE istifadeciler SET uzv_adi='$ad' and uzv_mail = '$mail' where uzv_id='$id'");
			$_SESSION["ad"] = $ad;
		}
		
	}else{
		echo "Şifrə yanlışdır.";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
</head>
<body>
	<div id="main" style="margin-top:20px;">
		<div id="mainleft">	
			<a onclick="op1()" id="posts" style="opacity: 1;">PAYLAŞIMLARIM</a><br>
			<a id="account" onclick="op2()" >HESAB</a><br>
			<a href="cixis.php">ÇIXIŞ</a>
		</div>
		<div id="mainright" style="border:0px solid green;width:100%;height: 100%;margin-bottom:100px;display: block;">
			<div style="width:100%;height: 100%;" id="postmain">
				<div id="row">
				<?php 
				foreach($data as $m){
				$sekilsayi = substr_count($m["sekil_adi"],";") + 1; 						 $sekilarray=explode(";",$m["sekil_adi"]);
					?>
				<div class="rows" style="text-align: center;">
			<div id="rowpic" onclick="location.href='../moredetail.php?id=<?php echo $m['id'];?>'">
				<div id="inpicrow">
				<img id="picback" alt="img" src="../<?php if($sekilsayi==1){echo $m["sekil_adi"];}else{echo $sekilarray[0];} ?>">
				<img id="pic" alt="img" src="../<?php if($sekilsayi==1){echo $m["sekil_adi"];}else{echo $sekilarray[0];}?>">
				</div>
			
				</div><br>			
			<a><?php echo strtoupper($m["ad"]);?></a><br>
			<?php
				if($m["endirim"] == 1 && !empty($m["endirimli"]) && !empty($m["endirimli"])){
					?>
				<s><?php echo $m["endirimsiz"];?> AZN</s>
				<b><?php echo $m["endirimli"];?> AZN</b>
				<?php
				}else{
				?>
			<b><?php echo $m["qiymet"]." AZN";}?></b>
					<div id="deled">
					<a class="deled" href="index.php?do=duzelt&id=<?php echo $m["id"]?>" class="edic" style="background: black;color:white;margin-top:10px;padding:6px;">Düzəliş et</a>
					<a class="deled" href="index.php?do=sil&id=<?php echo $m["id"]?>" class="edic" style="background:#d60004;color:white;padding:6px;">Sil</a>
					</div>
			</div>
				<?php
				}	
				if(!(@$check)){
				?><h2 style="margin-left:2%;width:50%;position: absolute;top:-20px;">PAYLAŞIMINIZ YOXDUR.</H2><input type='button' style="color:white;background:black;border:0px;cursor: pointer;font-weight:bold;width:21%;padding:10px;position: absolute;top:40px;margin-left:2%;" value='PAYLAŞIM ET' onclick="location.href='../add/'"/><?php
				}
				?>
			</div>
			</div>
			<div id="accountmain">
				<form action="" method="post">
				<input type="password" class="accountmaininput" name="pass" required placeholder="HAZIRKİ ŞİFRƏ"/><br>
				<input type="email" class="accountmaininput" name="email" placeholder="YENİ EMAIL"/>
				<input type="text" class="accountmaininput" name="name" placeholder="YENİ AD"><br>
				<button style="color:white; background:black;height:30px;width:100px;outline: none;font-weight: bold;border:0;cursor: pointer;" type="submit">TƏSDİQ ET</button>
				<input onclick="location.href='../login/reset'" style="color:white;position: absolute;background:black;height:30px;width:120px;outline: none;font-weight: bold;border:0;cursor: pointer;" type="button" value="ŞİFRƏNİ DƏYİŞ">
				</form>
			</div>
		</div>

	</div>
	<script>
		
		function op1(){
			var posts = document.querySelector("#posts");
			var account = document.querySelector("#account");
			if(posts.style.opacity == "1"){
				posts.style.opacity = "0.2";
			}else{
				account.style.opacity = "0.2";
				posts.style.opacity = "1";
			}
		}
		
		function op2(){
			var posts = document.querySelector("#posts");			
			var account = document.querySelector("#account");
			if(account.style.opacity == "1"){
				account.style.opacity = "0.2";
			}else{
				account.style.opacity = "1";
				posts.style.opacity = "0.2";
			}
		}
	</script>
</body>
</html>