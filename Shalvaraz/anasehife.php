<?php
	$katlg;
	include("mysql.php");
	$db = new mysqli($host,$usern,$userp,$dbname);

	switch($katlg){

		//trend		
		case "trndai":
		$d = $db->query("SELECT * FROM tablo where share = 1 and trend = 1 and katogory='aile' order by id desc ");
		break;
			
		case "trndot":
		$d = $db->query("SELECT * FROM tablo where share = 1 and trend = 1 and katogory='otag' order by id desc ");
		break;
			
		case "trndkost":
		$d = $db->query("SELECT * FROM tablo where share = 1 and trend = 1 and katogory='kost' order by id desc ");
		break;
			
		//qiz
		case "woall":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' order by id desc ");
		break;
			
		case "wonew":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' and new = 1 order by id desc ");
		break;
			
		case "wocloth":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' and katogory='cloth' order by id desc ");
		break;
			
		case "woxcloth":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' and katogory='xcloth' order by id desc ");
		break;
			
		case "woaks":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' and katogory='aks' order by id desc ");
		break;
			
		case "woshoes":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' and katogory='sshoes' order by id desc ");
		break;
			
		case "wokost":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' and katogory='kost' order by id desc ");
		break;
		
		case "wosport":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='woman' and katogory='sport' order by id desc ");
		break;
			
		//oglan	
		case "manall":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='kisi' order by id desc ");
		break;
		
		case "mannew":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='man' and new = 1  order by id desc ");
		break;
			
		case "mancloth":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='man' and katogory='cloth' order by id desc ");
		break;
			
		case "manxcloth":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='man' and katogory='xcloth' order by id desc ");
		break;
			
		case "manaks":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='man' and katogory='aks' order by id desc ");
		break;
			
		case "manshoes":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='man' and katogory='shoes' order by id desc ");
		break;
		
		case "mankost":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='man' and katogory='kost' order by id desc ");
		break;
			
		case "mansport":
		$d = $db->query("SELECT * FROM tablo where share = 1 and cins='man' and katogory='sport' order by id desc ");
		break;
			
		//yeni
		case "newcloth":
		$d = $db->query("SELECT * FROM tablo where share = 1 and new = 1 and katogory='cloth' order by id desc ");
		break;
			
		case "newaks":
		$d = $db->query("SELECT * FROM tablo where share = 1 and new = 1 and katogory='aks' order by id desc ");
		break;
			
		case "newshoes":
		$d = $db->query("SELECT * FROM tablo where share = 1 and new = 1 and katogory='shoes' order by id desc ");
		break;
			
		case "newkost":
		$d = $db->query("SELECT * FROM tablo where share = 1 and new = 1 and katogory='kost' order by id desc ");
		break;
			
		case "newsport":
		$d = $db->query("SELECT * FROM tablo where share = 1 and new = 1 and katogory='sport' order by id desc ");
		break;
			
		//endirim
		case "endirim":
		$d = $db->query("SELECT * FROM tablo where share = 1 and endirim= 1 order by id desc");
		break;
			
		default:
		$d = $db->query("SELECT * FROM tablo where share=1 order by id desc");
		break;
	}


?>


<?php
		foreach($d as $m){
			$sekilsayi = substr_count($m["sekil_adi"],";") + 1; $sekilarray=explode(";",$m["sekil_adi"]);
			?>
			<div class="rows" style="text-align: center;">
			<div id="rowpic" onclick="location.href='moredetail.php?id=<?php echo $m['id'];?>'">
				<div id="inpicrow">
				<img id="picback" alt="img" src="<?php echo $sekilarray[0];?>">
				<img id="pic" alt="img" src="<?php echo $sekilarray[0];?>">
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

		?>
		
		<?php
	

	

?>




