<?php 
include("../mysql.php");
$netice = $_POST["search"];

if($netice){
	$db = new PDO($pdo,$usern,$userp);
	$res = $db->prepare("SELECT * FROM tablo where ad like ? and share = 1 or katogory like ? and share = 1 or cins like ? and share = 1");
	$res->execute(array("%".$netice."%","%".$netice."%","%".$netice."%"));
	$show = $res->fetchAll(PDO::FETCH_ASSOC);
	$x = $res->rowCount();
	
	if($x){
		foreach($show as $m){
			$sekilsayi = substr_count($m["sekil_adi"],";") + 1; $sekilarray=explode(";",$m["sekil_adi"]);
			?>
			<div class="rows" style="text-align: center;">
			<div id="rowpic" onclick="location.href='../moredetail.php?id=<?php echo $m['id'];?>'">
				<div id="inpicrow">
				<img id="picback"alt="img" src="../<?php echo $sekilarray[0];?>">
				<img id="pic"alt="img" src="../<?php echo $sekilarray[0];?>">
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
			</div>
			<?php
			}
	}else{
		echo "<a style='color:#999;font-family:arial;font-weight:bold;'>Axtardığınız tapılmadı...</a>";
	}
	
}else{
	echo "";
}
?>