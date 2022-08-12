<?php
	session_start();	
// is_uploaded_file();
// move_uploaded_file();

	if($_FILES){
	$maxsize = 700000;
	$minsize = 10000;
		
	$ad         = $_POST["ad"];	
	$qiymet     = $_POST["qiymet"];		
	$sizevalue  = $_POST["size"];
	$aciqlama   = $_POST["aciqlama"];
	$number     = "994".$_POST["number"];
	$kategory   = $_POST["katogory"];
	$cins   	= $_POST["cins"];
	$share  	= "0";
	$user_id    = $_SESSION["id"];
		
	include("../mysql.php");	
		
		$imgcnt = count($_FILES["sekil"]["tmp_name"]);	
		$imgway = "";
		if($imgcnt>6){
			echo "Maksimum 6 sekil elave ede bilersiniz";
		}else{
			for($i=0;$imgcnt>$i;$i++){
				
				$fileuzanti = substr($_FILES["sekil"]["name"][$i],-4,4);
				$fileadi    = uniqid().$fileuzanti;	
				$fileyolu   = "images/".$fileadi;	
	
				$sekilTipi  = $_FILES["sekil"]["type"][$i];	
				$sekilSize  = $_FILES["sekil"]["size"][$i];	
					
				if($i+1 != $imgcnt){
					$imgway = $imgway.";".$fileyolu;
				}else{
					$imgway = $fileyolu.$imgway;
				}
				
				$yukle = move_uploaded_file($_FILES["sekil"]["tmp_name"][$i],"../".$fileyolu);
			}
		}		
		$db = new PDO($pdo,$usern,$userp);
		$saxla = $db->prepare("insert into tablo set
					
						sekil_adi=?,
						sekil_tip=?,
						sekil_size=?,
						qiymet=?,
						ad=?,
						aciqlama=?,
						sizevalue=?,
						number=?,
						katogory=?,
						cins=?,
						share =?,
						user_id=?
					
					"); 
					
				$saxla->execute(array($imgway,$sekilTipi,$sekilSize,$qiymet,$ad,$aciqlama,$sizevalue,$number,$kategory,$cins,$share,$user_id));
			
			if($saxla && $yukle){
				echo "<h2>Paylaşım təsdiq üçün idarə ediciyə göndərildi. Paylaşımınıza nəzər yetirdikdən sonra yayımlanacaq. Təşəkkür edirik.";
				header("refresh: 2;./");
			}else{
				echo "<h2>Xəta baş verdi<h2>";
			}
		
		

		
	}else{
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
		</head>
		<body>
			<div id="header">
		
		<div id="dvlogo" onclick="location.href='../'"><img alt="img" src="../img/pdffff.png" id="logo"></div>
		<div onclick="location.href='../search'" id="search">
		<a>Axtarış</a>
		<img alt="img" src="../img/Path 28.svg">
		</div>
			
		
		<div id="right"><div id="rgtop">
			<?php 
				if(@$_SESSION["ad"]){
					$id = $_SESSION["id"];
					$db = new mysqli($host,$usern,$userp,$dbname);
					$data = $db->query("SELECT * FROM istifadeciler WHERE uzv_id ='$id' LIMIT 1");
					
					foreach($data as $dt){
						$_SESSION["ad"] = $dt["uzv_adi"];
					}
					?><a style="cursor:pointer;" href='../userprofile/' ><?php echo mb_strtoupper($_SESSION["ad"])?></a>
					<img alt='img' style="cursor:pointer;" onclick="location.href='../basket/'" src='../img/Group 10.svg'><?php
					if(!empty($_SESSION["sebetsayi"])){
						?><span style="cursor:pointer;" onclick="location.href='../basket'"><?php echo $_SESSION["sebetsayi"];?></span><?php
					}else{
						?><span style="cursor:pointer;" onclick="location.href='../basket'">0</span><?php
					}
				}else{
					?><a style="cursor:pointer;" href='../login/'>DAXIL OL</a>	
					<img alt='img' style="cursor:pointer;" onclick="location.href='../login/'" src='../img/Group 10.svg'>	
					<span style="cursor:pointer;" onclick="location.href='../login'">0</span><?php 
				}
				
				?>
		</div>
		</div>
	
		</div>
		<div id="main">
			
		<form action="" method="post" id="mainform" enctype="multipart/form-data">
			<div id="form">
			<div id="formleft">
				
			<input type="file" id ="fileinput" name="sekil[]" multiple required accept=".jpg,.png"><br>
			<a id="sizebtn" style="cursor:pointer;user-select: none;">ÖLÇÜ</a>
			<div id="sizealt" style="display:none;width: 30%;position: absolute;top:140px;left:28%;">	
			<input type="text" name="size" ><a> SIZE</a>
			</div><br>
			<input type="number" name="qiymet" class="qymt" required max="9999" maxlenght="9"><a class="qymt">AZN</a><br>

			<div id="ktg">
			<input type="radio" name="cins" value="qadin" required id="qadin"><label for="qadin">QIZ</label><br>
				<br><div class="altkatog" id="qadinalt">
					<input type="radio" name="katogory" value="cloth" required id="qdnaks"><label for="qdnaks">Geyim</label><br>
					<input type="radio" name="katogory" value="xcloth" id="qdnckt"><label for="qdnckt">Xarici geyimlər</label><br>
					<input type="radio" name="katogory" value="aks" id="qdnplt"><label for="qdnplt">Aksesuar</label><br>
					<input type="radio" name="katogory" value="shoes" id="qdnkyn"><label for="qdnkyn">Ayaqqabı</label><br>
					<input type="radio" name="katogory" value="kost" id="qdntsrt"><label for="qdntsrt">Kostyumlar</label><br>
					<input type="radio" name="katogory" value="sport" id="qdnswt"><label for="qdnswt">İdman geyimləri</label><br>
				</div>
				
					<input type="radio" name="cins" value="kisi" id="kisi"><label for="kisi">OĞLAN</label><br>	
				<div class="altkatog" id="kisialt">
					<input type="radio" name="katogory" value="cloth" required id="mancl"><label for="mancl">Geyim</label><br>
					<input type="radio" name="katogory" value="xcloth" id="manxcl"><label for="manxcl">Xarici geyimlər</label><br>
					<input type="radio" name="katogory" value="aks" id="manaks"><label for="manaks">Aksesuar</label><br>
					<input type="radio" name="katogory" value="shoes" id="manshoes"><label for="manshoes">Ayaqqabı</label><br>
					<input type="radio" name="katogory" value="kost" id="mankost"><label for="mankost">Kostyumlar</label><br>
					<input type="radio" name="katogory" value="sport" id="mansport"><label for="mansport">İdman geyimləri</label><br>
				</div>
					
			</div>

			
			
			</div>
			
			<div id="formright">
				
			<input placeholder="MƏHSULUN ADI" maxlength="17" type="text" name="ad" required><br>
			
			<textarea placeholder="MƏHSUL HAQQINDA MƏLUMAT" name="aciqlama" style="max-height: 100px;max-width: 60%;min-width: 60%;min-height: 99px;border:1px solid black;resize:none;outline:none;" maxlength="150" ></textarea><br>
			<a style="background:white;">+994</a>
			<input type="number" required name="number"><br>
			
				
			</div>
			</div>

		<button type="submit">GÖNDƏR</button>
			
		</form>
			
		</div>
			
		<script type="text/javascript" src="add/js?v=<?php echo time();?>">
			
		</script>	
		
		<?php include("footer.html");?>
		</body>
		</html>
<?php
		
	}


?>