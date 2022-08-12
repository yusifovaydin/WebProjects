<?php 
include("../mysql.php");
$db = new mysqli($host,$usern,$userp,$dbname);
$s = $db->query("SELECT ")

?>
	<div class="rows">
	<div id="rowpic">
		<img id="picback"alt="img" src="<?php echo $m["sekil_adi"];?>">
		<img id="pic"alt="img" src="<?php echo $m["sekil_adi"];?>">	
	</div><br>
	<b><?php echo $m["ad"];?></b><br>
	<a><?php echo $m["qiymet"];?></a>
			</div>


