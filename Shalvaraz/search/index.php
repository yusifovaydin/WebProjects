<?php session_start();
include("../mysql.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ADELDO STORE</title>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylephon.css?v=<?php echo time(); ?>">
	<meta name ="viewport" content="width=device-width, initian-scale=1">
	<link  rel ="shorcut icon" type = "image/x-icon" href="../img/pdffff.jpg" >
	<script type="text/javascript">
		$(function(){
			$("#row").hide();
			$("input[id=img]").keyup(function(){
				var searchval = $(this).val();
				var them = "search="+searchval;
				
				$.ajax({
					type: "POST",
					url: "ajax.php",
					data: them,
					success: function(net){
						$("#row").show().html(net);
					}
				});
			});
		});
		
		
	</script>
</head>
<body>
	<div id="header">
	<div id="dvbuttonmenyu">
		<img alt="img" src="../img/Group 4.svg" id="buttonmenyu">		
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
					$id = $_SESSION["id"];
					$db = new mysqli($host,$usern,$userp,$dbname);
					$data = $db->query("SELECT * FROM istifadeciler WHERE uzv_id ='$id' LIMIT 1");
					
					foreach($data as $dt){
						$_SESSION["ad"] = $dt["uzv_adi"];
					}
					
					?><a style="cursor:pointer;color:black;font-weight: bold;font-family:sans-serif;font-size:30px;text-decoration: none;display:block;margin-top:50px;" href='./userprofile/' ><?php echo mb_strtoupper($_SESSION["ad"])?></a>
					<?php
					
				}else{
					?><a style="cursor:pointer;color:black;font-weight: bold;font-family:sans-serif;font-size:30px;text-decoration: none;display:block;margin-top:50px;" href='login'>DAXIL OL</a><?php 
				}
				
				?>
		</div>
		<div id="empty" style="border:0px solid red;height:40%;"></div>
		</div>
	</div>
		<div id="dvlogo" onclick="location.href='../index.php'"><img alt="img" src="../img/pdffff.png" id="logo"></div>
		<div id="search">
		<img alt="img" src="../img/Group 17.svg" onclick="location.href='../'">
		<input maxlength="30" type="text" id="img" placeholder="AXTARMAQ İSTƏDİYİNİZİ YAZIN"/>
		</div>
				
		<div id="right"><div id="rgtop">
			<?php 
				if(@$_SESSION["ad"]){
					?><a style="cursor:pointer;" href='../userprofile/'><?php echo strtoupper($_SESSION["ad"])?></a>
					<img alt='img' style="cursor:pointer;" onclick="location.href='../basket/'" src='../img/Group 10.svg'><?php
					if(!empty($_SESSION["sebetsayi"])){
						?><span style="cursor:pointer;" onclick="location.href='../basket'"><?php echo $_SESSION["sebetsayi"];?></span><?php
					}else{
						?><span style="cursor:pointer;" onclick="location.href='../basket'">0</span><?php
					}
				}else{
					?><a style="cursor:pointer;" href='../login'>DAXIL OL</a>	
					<img alt='img' style="cursor:pointer;" onclick="location.href='../login'" src='../img/Group 10.svg'>	
					<span style="cursor:pointer;" onclick="location.href='../login'">0</span><?php 
				}
				
				?>
			</div>
		<div id="rgbtm"><a>GÖRÜNÜŞ</a><a id="iki">2</a><a id="dord">4</a><!--<img alt="img" src="img/Line 14.svg">	<a id="openflt">+ FİLTERLƏR</a><br>--></div>	
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
<div id="main">	
	<div id="row">
	
	</div>
	<div id="add">
		<?php 
				if(@$_SESSION["ad"]){
					?><img alt="img" src="../img/plus.svg" onclick="location.href='../add/index.php'"><?php
				}else{
					?><img alt="img" src="../img/plus.svg" onclick="location.href='../login/'"><?php
				}								   
												   
		   ?>
	</div>
	<div id="row">	
	
		</div>
	</div>
	</div>
	<div id="footer">
		<div class="footerbtm">
			<a id="intrs">SİZƏ MARAQLI GƏLƏ BİLƏR</a>
			<div>
				<h3>AKSESUARLAR</h3><br>
				<h3>AYAQQABI</h3><br>
				<h3>ÇANTA</h3><br>
				<h3>CEKET</h3><br>
				<h3>KÖYNƏK ÜST</h3><br>
			</div>
			<div>
				<h3>SWITER</h3><br>
				<h3>POLO</h3><br>
				<h3>ŞALVAR</h3><br>
				<h3>KÖYNƏK</h3><br>
				<h3>ƏTƏK</h3><br>
			</div>
			<div>
				<h3>JEANS</h3><br>
				<h3>AKSESUARLAR</h3><br>
				<h3>ÇANTA</h3><br>
				<h3>AYAQQABI</h3><br>
			</div>
		</div>
		<div class="footerbtm2">
		<h4>FACEBOOK</h4><br>
		<h4>INSTAGRAM</h4><br>
		<h4>WHATSAPP</h4><br>
		<h4>TELEGRAM</h4><br>
		</div>
		<img alt="img" src="../img/Line 15.svg">
		<div class="footerbtm3">
		<div>
			<a>BIZI IZLE</a><br>
			<h4>FACEBOOK</h4><br>
			<h4>INSTAGRAM</h4><br>
			<h4>WHATSAPP</h4><br>
			<h4>TELEGRAM</h4>
		</div>
		<div>
			<a>KAMPANIYA</a><br>
			<h4>AKSESUAR</h4><br>
			<h4>ŞALVAR</h4><br>
			<h4>ÇANTA</h4><br>
			<h4>AYAQQABI</h4><br>
		</div>
		<div>
			<a>MEXFILIK</a><br>
			<h4>HÜQUQİ HAQQ</h4><br>
			<h4>OFİSİMİZ</h4><br>
			<h4>ƏLAQƏ</h4><br>
			<h4>HAQQIMIZDA</h4><br>
			</div>
		</div>
		<img alt="img" src="../img/Line 15.svg">
		<div class="footerbtm4">
			<div id="ftleft"><a>AZƏRBAYCAN</a><br><h5 onclick='location.href="../"'>NOWW</h5><h4>/</h4><h5 onclick='location.href="../"'>QADIN</h5><h4>/</h4><h5 onclick='location.href="../"'>KİSİ</h5><h4>/</h4><h5 onclick='location.href="../"' >USAQ</h5><h4>/</h4><h5 onclick='location.href="../"' >ENDİRİMLER</h5></div>
			<div id="ftright"><h4>© Bütün haqqlar qorunur</h4></div>
		</div>
	</div>

	<script type="text/javascript" src="style.js?v=<?php echo time(); ?>"></script>
</body>
</html>
