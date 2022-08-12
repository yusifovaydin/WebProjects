
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<link rel ="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">

</head>
<body>
	<div>
	<?php
		if(!empty($_SESSION["sebet"])){
			foreach($_SESSION["sebet"] as $key){
				$sekilsayi = substr_count($key["sekil"],";") + 1; $sekilarray=explode(";",$key["sekil"]);
				?>
					
			<div id="rows" style="text-align: center;">
			<a  href="../moredetail.php?id=<?php echo trim($key['mehsulid'], "'");?>"><div id="rowpic" style="border-bottom:1px solid black;cursor: pointer;">
				<?php if($sekilsayi == 1){
					?>
				<img id="picback" alt="img" src="../<?php echo $key["sekil"];?>">
				<img id="pic" alt="img" src="../<?php echo $key["sekil"];?>">	
				<?php					
				}else{
				?>
				<img id="picback" alt="img" src="../<?php echo $sekilarray[0];?>">
				<img id="pic" alt="img" src="../<?php echo $sekilarray[0];?>">				
				<?php		
				}?>
				
				
				
				
				</div></a><br>
			<a><?php echo strtoupper($key["mehsulad"]);?></a><br>
			<?php
			include("../mysql.php");
				$mhsid = $key["mehsulid"];
				$db = new mysqli($host,$usern,$userp,$dbname);
				$dat = $db->query("SELECT * FROM tablo WHERE id='$mhsid' ");
					
				foreach($dat as $m){				
				if($m["endirim"] == 1 && !empty($m["endirimli"]) && !empty($m["endirimli"])){
					?>
				<s><?php echo $m["endirimsiz"];?> AZN</s>
				<b><?php echo $m["endirimli"];?> AZN</b>
				<?php
				}else{
				?>
			<b><?php echo $m["qiymet"]." AZN";} }?></b><br>
				<form action="ish.php" method="post">
				<input type="hidden" value="<?php echo $key['mehsulid'];?>" name="id"/>
				<input type="hidden" value="sil" name="ish"/>
				<button type="submit" style="color:white;display: block;width:100%;background:black;padding:10px 0;margin-top:5px;text-decoration:none;font-weight: bold;font-family:arial;cursor:pointer;border:0px;"class="text-danger" >SƏBƏTDƏN SİL</button>
				</form>
			</div>
		
			
	<?php
				
			}
		}else{
			$_SESSION["sebetsayi"]=0;
			echo "<a style='font-weight:bold;position:absolute;left:3%;font-family:sans-serif;opacity:0.5;'>SEBETDE MƏHSUL YOXDUR!</a>";
		}
	?> 
	</div>
</body>
</html>