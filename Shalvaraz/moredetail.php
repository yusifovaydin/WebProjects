<?php

if ( $_GET ) {
  session_start();
  $id = $_GET[ "id" ];
  include("mysql.php");
  $db = new mysqli( $host, $usern, $userp, $dbname );
  $data = $db->query( "SELECT * FROM tablo where id='$id'" );
  $link = "www.shalvar.store/moredetail.php?id=" . $id;

  foreach ( $data as $alldata ) {
    $ad = mb_strtoupper( $alldata[ "ad" ] );
    $qiymet = $alldata[ "qiymet" ];
    @$sizevalue = @$alldata[ "sizevalue" ];
    $number = $alldata[ "number" ];
    $sekil = $alldata[ "sekil_adi" ];
    $katogory = $alldata[ "katogory" ];
    $cins = $alldata[ "cins" ];
    $aciqlama = mb_strtoupper( $alldata[ "aciqlama" ] );
    $share = $alldata[ "share" ];
    $endirimli = $alldata[ "endirimli" ];
    $endirimsiz = $alldata[ "endirimsiz" ];
  }
  $check = mysqli_num_rows( $data );

  if ( $check && $share == 1 ) {

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $ad;?></title>
<link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="morestyle.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="morestyletab.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="morestylephon.css?v=<?php echo time(); ?>">
<meta name ="viewport" content="width=device-width, initian-scale=1">
<link  rel ="shorcut icon" type = "image/x-icon" href="img/pdffff.jpg" >

</head>
<body>
<div id="header">
  <div id="dvbuttonmenyu"> <img alt="img" src="img/Group 4.svg" id="buttonmenyu">
    <div id="openmenyu">
    <img src="img/cancel.png" alt="img" style="display:none" id="clsmenyu">
		<li onclick="location.href='index.php'">BÜTÜN MƏHSULLAR</li>

		<li id="pres">TREND MƏHSULLAR</li>
		<div id ="mu6" class = "altmenyu">
			<ul onclick="location.href='index.php?katlg=trndai'">Ailə kolleksiyası</ul>
			<ul onclick="location.href='index.php?katlg=trndot'">Uşaq otağı</ul>
			<ul onclick="location.href='index.php?katlg=trndkost'">Uşaq kostyumu</ul>
		</div>

		<li id="woman">QIZ UŞAQLARI</li>
		<div id ="mu2" class = "altmenyu">
			<ul id = "aks" onClick="location.href='index.php?katlg=woall'">Hamısını araşdırın</ul>
			<ul onclick="location.href='index.php?katlg=wonew'">Yeni məhsullar</ul>
			<ul onclick="location.href='index.php?katlg=wocloth'">Geyim</ul>
			<ul onclick="location.href='index.php?katlg=woxcloth'">Xarici geyimlər</ul>
			<ul onclick="location.href='index.php?katlg=woaks'">Aksesuar</ul>
			<ul onclick="location.href='index.php?katlg=woshoes'">Ayaqqabı</ul>
			<ul onclick="location.href='index.php?katlg=wokost'">Kostyumlar</ul>
			<ul onclick="location.href='index.php?katlg=wosport'">İdman geyimləri</ul>
		</div>

		<li id="man">OĞLAN UŞAQLARI</li>
		<div id ="mu3" class = "altmenyu">
			<ul onclick="location.href='index.php?katlg=manall'">Hamısını araşdırın</ul>
			<ul onclick="location.href='index.php?katlg=mannew'">Yeni məhsullar</ul>
			<ul onclick="location.href='index.php?katlg=mancloth'">Geyim</ul>
			<ul onclick="location.href='index.php?katlg=manxcloth'">Xarici geyimlər</ul>
			<ul onclick="location.href='index.php?katlg=manaks'">Aksesuar</ul>
			<ul onclick="location.href='index.php?katlg=manshoes'">Ayaqqabı</ul>
			<ul onclick="location.href='index.php?katlg=mankost'">Kostyumlar</ul>
			<ul onclick="location.href='index.php?katlg=mansport'">İdman geyimləri</ul>
		</div>

		<li id="child">YENİ MƏHSULLAR</li>
		<div id ="mu4" class = "altmenyu">
			<ul onclick="location.href='index.php?katlg=newcloth'">Geyim</ul>
			<ul onclick="location.href='index.php?katlg=newaks'">Aksesuar</ul>
			<ul onclick="location.href='index.php?katlg=newshoes'">Ayaqqabı</ul>
			<ul onclick="location.href='index.php?katlg=newkost'">Uşaq kostyumu</ul>
			<ul onclick="location.href='index.php?katlg=newsport'">İdman geyimləri</ul>
		</div>
		<li id="home" onclick="location.href='index.php?katlg=endirim'">ENDIRIMLƏR</li>
    
    <div id="admenyu" style="display:none;color:black;">
			<?php 
				if(@$_SESSION["ad"]){
          
					$uid = $_SESSION["id"];
					$db = new mysqli($host,$usern,$userp,$dbname);
					$data = $db->query("SELECT * FROM istifadeciler WHERE uzv_id ='$uid' LIMIT 1");
					
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

      <img alt="img" src="img/pdffff.png" id="mnyimg">
      <div id="empty" style="border:0px solid red;height:40%;"></div>
    </div>
  </divxxxx>
  <div id="dvlogo" onclick="location.href='./'" ><img style="top:0!important;" alt="img" src="img/pdffff.png" id="logo"></div>
  <div id="search" onclick="location.href='search'"> <a>Axtarış</a> <img alt="img" src="img/Path 28.svg"> </div>
  <div id="right">
    <div id="rgtop">
      <?php
      if ( @$_SESSION[ "ad" ] ) {
        ?>
      <a style="cursor:pointer;" href='./userprofile/'><?php echo strtoupper($_SESSION["ad"])?></a> <img alt='img' style="cursor:pointer;" onclick="location.href='./basket/'" src='img/Group 10.svg'>
      <?php
      if ( !empty( $_SESSION[ "sebetsayi" ] ) ) {
        ?>
      <span style="cursor:pointer;" onclick="location.href='./basket'"><?php echo $_SESSION["sebetsayi"];?></span>
      <?php
      } else {
        ?>
      <span style="cursor:pointer;" onclick="location.href='./basket'">0</span>
      <?php
      }
      } else {
        ?>
      <a style="cursor:pointer;" href='login'>DAXIL OL</a> <img alt='img' style="cursor:pointer;" onclick="location.href='./login'" src='img/Group 10.svg'> <span style="cursor:pointer;" onclick="location.href='./login'">0</span>
      <?php
      }

      ?>
    </div>
    <div id="rgbtm"></div>
  </div>
</div>
<div id="main">
  <form action="basket/ish.php" method="post">
    <div id="post" style="width:96%;margin-left:2%;margin-top:245px;display: flex;">
      <?php
      $sekilsayi = substr_count( $sekil, ";" ) + 1;
      $sekilarray = explode( ";", $sekil );

      if ( $sekilsayi != 1 ) {
        $i = 1;
        ?>
      <div id = "rows" style="width: 40%;margin-left:20%;position: relative;">
        <div class="container">
          <div id="rowpic" >
            <?php
            foreach ( $sekilarray as $imgdata ) {
              ?>
            <div class="mySlides" style="border:1px solid black!important;">
              <div class="numbertext"><?php echo $i."/".$sekilsayi;?></div>
              <img  id="picback" src="<?php echo $imgdata;?>" style="width:100%"> <img  id="pic" src="<?php echo $imgdata;?>" style="width:100%"> </div>
            <?php
            $i++; } 
			?>
          </div>
          <div class="row">
            <?php $i=1; foreach($sekilarray as $imgdata){?>
            <div class="column" style="z-index:1;"> <img class="demo cursor" src="<?php echo $imgdata; ?>" style="width:100%" onclick="currentSlide(<?php echo $i;?>)" alt="nowwimg"> </div>
            <?php	$i++;}?>
          </div>
          <a class="prev" onclick="plusSlides(-1)">❮</a> <a class="next" onclick="plusSlides(1)">❯</a> </div>
      </div>
      <?php
      } else {
        ?>
      <div class="rows" style="width: 40%;margin-left:20%;">
        <div id="rowpic" style="border:1px solid black;"> <img id="picback"alt="img" src="<?php echo $sekil;?>" style="width:100%"> <img id="pic"alt="img" src="<?php echo $sekil;?>" style="width:100%"> </div>
        <br>
      </div>
      <?php
      }
      ?>
      <div id="rowright" style="padding-left: 5%;padding-top: 5%;width:40%;font-weight: bold;"> <a style="display: block;margin-bottom: 20px;"><?php echo $ad;?></a><br>
        <a style="display: block;margin-bottom: 10px;"><?php echo $aciqlama;?></a><br>
        <a style="display: block;margin-bottom: 10px;"><?php echo $sizevalue;?></a><br>
        <?php
        if ( !empty( $endirimli ) && !empty( $endirimsiz ) ) {
          ?>
        <s><?php echo $endirimsiz;?>AZN</s><br>
        <a><?php echo $endirimli;?>AZN</a><br>
        <?php
        } else {
          ?>
        <a><?php echo $qiymet;?> AZN</a><br>
        <?php
        }
        ?>
        <input type="hidden" name="ad" value="<?php echo $ad;?> ">
        <input type="hidden" name="qiymet" value="<?php echo $qiymet;?> ">
        <input type="hidden" name="sekil" value="<?php echo $sekil;?> ">
        <input type="hidden" name="olcu" value="<?php echo $size;?> ">
        <input type="hidden" name="id" value="<?php echo $id;?> ">
        <input type="hidden" name="ish" value="add">
        <div id="buttons">
          <input type="button" value="WHATSAPPLA ƏLAQƏ" onclick="location.href='https://api.whatsapp.com/send?phone=+<?php echo $number;?>&text=<?php echo $link;?> linkində yerləşən məhsul üçün marağlanıram.'" target="_blank" style="background: DARKgreen;height:100%!İMPORTANT;color:white;font-weight: bold; width:45%;margin-right: 10%; border:0;outline: none;cursor: pointer;"/>
          <br>
          <?php
          if ( isset( $_SESSION[ "ad" ] ) ) {
            ?>
          <button type="submit" value="add" style=" color:white;width:45%;background:#000;border:0;padding:20px;font-weight:bold;font-family:arial;cursor:pointer;">SƏBƏTƏ AT</button>
          <?php
          } else {
            ?>
          <input type="button" value="SƏBƏTƏ AT" style=" color:white;width:45%;background:#000;border:0;padding:20px;font-weight:bold;font-family:arial;cursor:pointer;" onclick="location.href='login/'" >
          <?php
          }

          ?>
        </div>
      </div>
    </div>
  </form>
  <div id="teklif"> <a  id="teklifa">BUNLARIDA SİZƏ TƏKLİF EDİRİK</a><br>
    <div id="teklifbottom">
      <?php
      $teklif = $db->query( "SELECT * FROM tablo WHERE cins ='$cins' AND NOT id='$id' LIMIT 4" );

      foreach ( $teklif as $m ) {
        $sekilsayi = substr_count( $m[ "sekil_adi" ], ";" ) + 1;
        $sekilarray = explode( ";", $m[ "sekil_adi" ] );
        ?>
      <div class="rows" style="text-align: center;width:10%;">
        <div id="rowpic" style="height:65%!important;" onclick="location.href='moredetail.php?id=<?php echo $m['id'];?>'">
          <div id="inpicrow"> <img id="picback" alt="img" src="<?php echo $sekilarray[0];?>"> <img id="pic" alt="img" src="<?php echo $sekilarray[0];?>"> </div>
        </div>
        <br>
        <a><?php echo strtoupper($m["ad"]);?></a><br>
        <?php
        if ( $m[ "endirim" ] == 1 && !empty( $m[ "endirimli" ] ) && !empty( $m[ "endirimli" ] ) ) {
          ?>
        <s><?php echo $m["endirimsiz"];?> AZN</s> <b><?php echo $m["endirimli"];?> AZN</b>
        <?php
        } else {
          ?>
        <b><?php echo $m["qiymet"]." AZN";}?></b> </div>
      <?php
      }


      ?>
    </div>
  </div>
</div>
<?php include("footer.html");?>
<script type="text/javascript" src="morestyle.js?v=<?php echo time(); ?>"></script>
<script type="text/javascript">
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
		}

		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("demo");
			var captionText = document.getElementById("caption");
			if (n > slides.length) {slideIndex = 1}
			if (n < 1) {slideIndex = slides.length}
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";
			dots[slideIndex-1].className += " active";
			captionText.innerHTML = dots[slideIndex-1].alt;
		}
	</script>
</body>
</html>
<?php

} else {

  echo "<div style='position:absolute;left:0;top:60px;width:100%;padding:3% 0;background:black;color:WHITE;font-weight:bold;font-size:30px;text-align:center;font-family:sans-serif;'>Bu məhsul mövcud deyil..</div><style>html{width:100%;height:100%;margin:0;}body{margin:0;width:100%;background:url('img/back.jpg') no-repeat;background-size: cover;}</style>";

}


} else {
  echo "<div style='position:absolute;left:0;top:60px;width:100%;padding:3% 0;background:black;color:WHITE;font-weight:bold;font-size:30px;text-align:center;font-family:sans-serif;'>Bu səhifə mövcud deyil..</div><style>html{width:100%;height:100%;margin:0;}body{margin:0;width:100%;background:url('img/back.jpg') no-repeat;background-size: cover;}</style>";
}