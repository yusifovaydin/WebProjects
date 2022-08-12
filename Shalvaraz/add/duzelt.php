<?php
		if($_FILES){
			$id = $_GET["id"];
			
			$maxsize = 700000;
			$minsize = 10000;
		
			$fileuzanti = substr($_FILES["sekil"]["name"],-4,4);
			$fileadi    = rand(1,99999).$fileuzanti;
			$fileyolu   = "posts/".$fileadi;
			$qiymet     = $_POST["qiymet"];
			$ad         = $_POST["ad"];
			$sekil = $_FILES["sekil"]["type"];
			
			if($sekil === "image/jpeg" || $sekil === "image/png"){
		
			if($_FILES["sekil"]["size"]>$maxsize){
			echo "<a> Yüklədiyiniz file 700kb'dan böyük ola bilməz";
			
			}else if($_FILES["sekil"]["size"]<$minsize){
				echo "<a> Yüklədiyiniz file 10kb'dan kiçik ola bilməz";
			}else{
				
				if(is_uploaded_file($_FILES["sekil"]["tmp_name"])){
					$yukle = move_uploaded_file($_FILES["sekil"]["tmp_name"],$fileyolu);
					
					$tap =$db->prepare("select * from endirim where id=?");
					$tap->execute(array($id));
					
					$v = $tap->fetch(PDO::FETCH_ASSOC);
					unlink($v["sekil_adi"]);
					$saxla = $db->prepare("update endirim set
					
						sekil_adi=?,
						sekil_tip=?,
						sekil_size=?,
						qiymet=?,
						ad=? where id=?
					
					"); 
					
					$sekilTipi = $_FILES["sekil"]["type"];
					$sekilSize = $_FILES["sekil"]["size"];
					
					$saxla->execute(array($fileyolu,$sekilTipi,$sekilSize,$qiymet,$ad,$id));
					
					if($yukle){
						echo "<h2>Şəkil uğurla yükləndi...</h2>";
						header("refresh: 2; url=index.php");
					}else{
						echo "<h2>Şəkil yüklənərkən xəta baş verdi...</h2>";
						header("refresh: 2; url=index.php");
					}
					
				}else{
					echo "<h2>Şəkil yüklənərkən xəta baş verdi...</h2>";
				}
				
			}	
					
		}else{
			echo "<h2>Faylın tipi yalnız jpg və ya png ola bilər...</h2>";
		}
		
		
		
			
			
	}else{
			$id = $_GET["id"];
			$b = $db->prepare("select * from endirim where id=?");
			$b->execute(array($id));
			$b = $b->fetch(PDO::FETCH_ASSOC);
			
		?>
		<div id="main">
		<form action="" method="post" enctype="multipart/form-data">
		<a>Məhsulu düzəlt</a><br>
		<input type="file" name="sekil" required><br>
		<a>Məhsulun adı</a><br>
		<input type="text" name="ad" required><br>
		<a>Açıqlama</a><br>
		<textarea></textarea><br>
		<a>Məhsul</a><br>
		<input type="radio" name="value">İSTİFADƏ EDİLMİŞ<br>
		<input type="radio" name="value">YENİ<br>
		<a>Qiymət</a><br>
		<input type="number" name="qiymet" maxlenght="9"><br>
		<a>Kateqoriya</a><br>
		<input type="radio" name="gender">QADIN<br>
		<input type="radio" name="gender">KİŞİ<br>
		<input type="radio" name="gender">UŞAQ<br>
		<a>Əlaqə Nömrə</a><br>
		<input type="number"><br>
		<a>Ünvan</a><br>
		<input type="text" name="location"/><br>
		<button type="submit">GÖNDƏR</button>
		</form>
		</div>
		<?php
			
					
					?>
						<div id="row">
						<img width="400" height="400" src="<?php echo $b["sekil_adi"];?>">
						<h4><?php echo $b["ad"];?></h4>
						<h4><?php echo $b["qiymet"];?> AZN</h4>
						<a href="?do=sil&id=<?php echo $b["id"];?>">Sil</a>
						<a href="?do=duzelt&id=<?php echo $b["id"];?>">Duzelt</a>
						
						</div>
					<?php
					
				
		
	}


?>