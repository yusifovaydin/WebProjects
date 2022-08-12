<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DAXİL OL</title>
	<link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylephon.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link  rel ="shorcut icon" type = "image/x-icon" href="../img/pdffff.jpg" >

</head>
<body>

<div id="header">
	<div id="dvbuttonmenyu">
		<img alt="img" src="../img/Group 4.svg" id="buttonmenyu">		
		<div id="openmenyu">
			<img src="../img/cancel.png" alt="img" style="display:none;width:30px;height:30px;position:absolute;top:5%;right:10%;" id="clsmenyu">
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
		<img alt="img" src="../img/pdffff.svg" id="logo">
		
		
	
	</div>
	<div id="main">
		<div id="lg">
		<form action="yoxlama.php" method="post">
		<a>DAXIL OL</a><br>
		<h5>E-mail</h5>
		<input type="email" required name="email" placeholder=""/>
		<h5>Şifrə</h5>
		<input type="password" required name="password" placeholder=""/>
		<h4 onclick="location.href='reset/'">Şifrəvi unutmusan?</h4>			
		<button type="submit">DAXİL OL</button>
		</form>
		</div>

		<div id="regs">
		<a>QEDİYYAT</a><br>
		<h5>Əgər sizin hələdə shalvar.store'də qeydiyyatınız yoxdursa, bu seçimi istifadə edə bilərsiz.</h5><br>
		<h5>Bizim sizə təqdim edəcəyimiz təkliflər əyləncəli və əlverişli olacaqdır. </h5><br>	
		<div onclick="location.href='../register/'">QEYDİYYATDAN KEÇ</div>
		</div>
	</div>
	<div id="footer"></div>
<script src="style.js" type="text/javascript" ></script>
</body>
</html>