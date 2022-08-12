<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name ="viewport" content="width=device-width, initian-scale=1">
	<link rel ="stylesheet" type="text/css" href="style.css?v=<?php echo time();?>">
	<link  rel ="shorcut icon" type = "image/x-icon" href="../img/pdffff.jpg" >
	<title>ADELDO STORE</title>
	</head>
<body>
	<div id="header">
	<div id="dvbuttonmenyu"> <img alt="img" src="../img/Group 4.svg" id="buttonmenyu">
    <div id="openmenyu">
    <img src="../img/cancel.png" alt="img" style="display:none" id="clsmenyu">
		<li onclick="location.href='../'">BÜTÜN MƏHSULLAR</li>

		<li id="pres">TREND MƏHSULLAR</li>
		<div id ="mu6" class = "altmenyu">
			<ul onclick="location.href='../index.php?katlg=trndai'">Ailə kolleksiyası</ul>
			<ul onclick="location.href='../index.php?katlg=trndot'">Uşaq otağı</ul>
			<ul onclick="location.href='../index.php?katlg=trndkost'">Uşaq kostyumu</ul>
		</div>

		<li id="woman">QIZ UŞAQLARI</li>
		<div id ="mu2" class = "altmenyu">
			<ul id = "aks" onClick="location.href='../index.php?katlg=woall'">Hamısını araşdırın</ul>
			<ul onclick="location.href='../index.php?katlg=wonew'">Yeni məhsullar</ul>
			<ul onclick="location.href='../index.php?katlg=wocloth'">Geyim</ul>
			<ul onclick="location.href='../index.php?katlg=woxcloth'">Xarici geyimlər</ul>
			<ul onclick="location.href='../index.php?katlg=woaks'">Aksesuar</ul>
			<ul onclick="location.href='../index.php?katlg=woshoes'">Ayaqqabı</ul>
			<ul onclick="location.href='../index.php?katlg=wokost'">Kostyumlar</ul>
			<ul onclick="location.href='../index.php?katlg=wosport'">İdman geyimləri</ul>
		</div>

		<li id="man">OĞLAN UŞAQLARI</li>
		<div id ="mu3" class = "altmenyu">
			<ul onclick="location.href='../index.php?katlg=manall'">Hamısını araşdırın</ul>
			<ul onclick="location.href='../index.php?katlg=mannew'">Yeni məhsullar</ul>
			<ul onclick="location.href='../index.php?katlg=mancloth'">Geyim</ul>
			<ul onclick="location.href='../index.php?katlg=manxcloth'">Xarici geyimlər</ul>
			<ul onclick="location.href='../index.php?katlg=manaks'">Aksesuar</ul>
			<ul onclick="location.href='../index.php?katlg=manshoes'">Ayaqqabı</ul>
			<ul onclick="location.href='../index.php?katlg=mankost'">Kostyumlar</ul>
			<ul onclick="location.href='../index.php?katlg=mansport'">İdman geyimləri</ul>
		</div>

		<li id="child">YENİ MƏHSULLAR</li>
		<div id ="mu4" class = "altmenyu">
			<ul onclick="location.href='../index.php?katlg=newcloth'">Geyim</ul>
			<ul onclick="location.href='../index.php?katlg=newaks'">Aksesuar</ul>
			<ul onclick="location.href='../index.php?katlg=newshoes'">Ayaqqabı</ul>
			<ul onclick="location.href='../index.php?katlg=newkost'">Uşaq kostyumu</ul>
			<ul onclick="location.href='../index.php?katlg=newsport'">İdman geyimləri</ul>
		</div>
		<li id="home" onclick="location.href='../index.php?katlg=endirim'">ENDIRIMLƏR</li>
    
    <div id="admenyu" style="display:none;color:black;">
			<?php 
				if(@$_SESSION["ad"]){
          
					$uid = $_SESSION["id"];
					$db = new mysqli($host,$usern,$userp,$dbname);
					$data = $db->query("SELECT * FROM istifadeciler WHERE uzv_id ='$uid' LIMIT 1");
					
					foreach($data as $dt){
						$_SESSION["ad"] = $dt["uzv_adi"];
					}
					
					?><a style="cursor:pointer;color:black;font-weight: bold;font-family:sans-serif;font-size:30px;text-decoration: none;display:block;margin-top:50px;" href='./' ><?php echo mb_strtoupper($_SESSION["ad"])?></a>
					<?php
					
				}else{
					?><a style="cursor:pointer;color:black;font-weight: bold;font-family:sans-serif;font-size:30px;text-decoration: none;display:block;margin-top:50px;" href='../login'>DAXIL OL</a><?php 
				}
				
				?>
		</div>
		<div id="empty" style="border:0px solid red;height:40%;"></div>

    
  </div>
      <div id="empty" style="border:0px solid red;height:40%;"></div>
    </div>
		<div id="dvlogo" onclick="location.href='../index.php'"><img alt="img" src="../img/pdffff.png" id="logo"></div>
		<div onclick="location.href='../search'" id="search">
		<a>Axtarış</a>
		<img alt="img" src="../img/Path 28.svg">
		</div>		
		<div id="right"><div id="rgtop">
			<?php 
				if(@$_SESSION["ad"]){
					?><a style="cursor:pointer;" href='./'><?php echo strtoupper($_SESSION["ad"])?></a>
					<img alt='img' style="cursor:pointer;" onclick="location.href='../basket/'" src='../img/Group 10.svg'><?php
					if(!empty($_SESSION["sebetsayi"])){
						?><span style="cursor:pointer;font-weight:bold;" onclick="location.href='../basket'"><?php echo $_SESSION["sebetsayi"];?></span><?php
					}else{
						?><span style="cursor:pointer;font-weight:bold;" onclick="location.href='../basket'">0</span><?php
					}
				}else{
					?><a style="cursor:pointer;" href='../login/'>DAXIL OL</a>	
					<img alt='img' style="cursor:pointer;" onclick="location.href='../login'" src='../img/Group 10.svg'>	
					<span style="cursor:pointer;font-weight:bold;" onclick="location.href='../login'">0</span><?php 
				}
				
				?>
			</div>
		<div id="rgbtm"><!--<img alt="img" src="img/Line 14.svg">	<a id="openflt">+ FİLTERLƏR</a><br>--></div>	
		<!--	<div id ="filtrs">
			<a id="closeflt"><b>- FİLTERLƏR</b></a><a id ="clr">Təmizlə</a><br><br>
			<li><b>Ölçü</b>
				<ul>S</ul>
				<ul>M</ul>
				<ul>L</ul>
				<ul>XL</ul><br>
				</li>
			<li><b>Rəng</b>
				<ul>Yaşıl</ul>
				<ul>Qırmızı</ul>
				<ul>Göy</ul>
				<ul>Qara</ul>
				<ul>Ağ</ul>
				</li><br>
			<li><b>Max qiymet</b>
				<ul>50</ul>
				<ul>100</ul>
				<ul>150</ul>
				<ul>200</ul>
				</li><br>
				</div>-->
		</div>
	
</div>

	<script type="text/javascript" src="style.js"></script>
	</body>
	
</html>