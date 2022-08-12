<?php
@session_start();
$postid = @$_GET[ "id" ];
$userid = $_SESSION[ "id" ];
include("../mysql.php");
$tbname = "tablo";

$db = new mysqli( $host, $usern, $userp, $dbname );


if ( $_POST ) {
  if ( $userid ) {

    $data = $db->query( "SELECT * FROM tablo WHERE id = '$postid' LIMIT 1" );
    foreach ( $data as $all ) {
      $foruserid = $all[ "user_id" ];
    }

    if ( $userid == $foruserid ) {
      $doedit = @$_GET[ "doedit" ];
      $ad = @$_POST[ "postname" ];
      $katogory = @$_POST[ "katogory" ];
      $cins = @$_POST[ "cins" ];
      $size = @$_POST[ "size" ];
      $aciqlama = @$_POST[ "aciqlama" ];
      $share = 0;
      $user_id = $_SESSION[ "user_id" ];
      $number = @$_POST[ "number" ];
      $endirimli = @$_POST[ "endirimli" ];
      $endirimsiz = @$_POST[ "endirimsiz" ];
      $qiymet = @$_POST[ "qiymet" ];

      switch ( $doedit ) {

        case "ad":
          $db->query( "update tablo set ad='$ad' where id='$postid'" );
          header( "location:index.php?do=duzelt&id=" . $postid );
          break;

        case "qiymet":
          $db->query( "update tablo set qiymet='$qiymet' where id='$postid'" );
          header( "location:index.php?do=duzelt&id=" . $postid );
          break;

        case "size":
          $db->query( "update tablo set sizevalue='$size' where id='$postid'" );
          header( "location:index.php?do=duzelt&id=" . $postid );
          break;

        case "aciqlama":
          $db->query( "update tablo set aciqlama='$aciqlama' where id='$postid'" );
          header( "location:index.php?do=duzelt&id=" . $postid );
          break;

        case "number":
          $db->query( "update tablo set number='$number' where id='$postid'" );
          header( "location:index.php?do=duzelt&id=" . $postid );
          break;

        case "katogory":
          $db->query( "update tablo set katogory='$katogory',cins='$cins' where id='$postid'" );
          header( "location:index.php?do=duzelt&id=" . $postid );
          break;

        case "endirim":
          $db->query( "update tablo set endirim='1',endirimli='$endirimli',endirimsiz='$endirimsiz' where id='$postid'" );
          header( "location:index.php?do=duzelt&id=" . $postid );
          break;
		
		case "endirimdelete":
			$db->query("update tablo set endirim='0' where id='$postid'");
			header("location:index.php?do=duzelt&id=".$postid);
			break;	  

        default:
          header( "location:../" );
          break;
      }

    } else {
      echo "Siz deyişiklik edə bilməzsiniz";

    }
  } else {
    header( "location:../login/" );
  }
} else {

  $data = $db->query( "SELECT * FROM tablo WHERE id='$postid' LIMIT 1" );

  foreach ( $data as $alldata ) {
    $sekiladi = $alldata[ "sekil_adi" ];
    $sqlpostid = $alldata[ "user_id" ];
  }

  if ( !empty( $userid ) ) {
    if ( isset( $sqlpostid ) ) {
      if ( $sqlpostid == $userid ) {
        foreach ( $data as $m ) {
          $sekilsayi = substr_count( $m[ "sekil_adi" ], ";" ) + 1;
          $sekilarray = explode( ";", $m[ "sekil_adi" ] );
          ?>

<style>
@media only Screen and (min-width: 992px) and (max-width:160000px){


  img {
    vertical-align: middle;
}
/* Position the image container (needed to position the left and right arrows) */
.container {
    position: relative;
}
/* Hide the images by default */
.mySlides {
    display: none;
	height: 100%;
}
/* Add a pointer when hovering over the thumbnail images */
.cursor {
    cursor: pointer;
}
/* Next & previous buttons */
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    color: black;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
}
/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
	.prev{
		left:0;
	}
/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
    color: white;
    background-color: rgba(0, 0, 0, 0.8);
}
/* Container for image text */
.caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
}
.row {
    height: 100px;
    display: flex;
}
/* Number text (1/3 etc) */
.numbertext {
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    border: 1px solid black;
    z-index: 1;
    background: white;
}
/* Six columns side by side */
.column {
    width: 90px;
    height: 90px;
    bottom: 0;
}
/* Add a transparency effect for thumnbail images */
.demo {
    opacity: 0.6;
    object-fit: cover;
    height: 90px;
    width: 90px;
}
.active, .demo:hover {
    opacity: 1;
}
form{	
font-family: arial;
font-weight: bold;
	margin-top:30px;
	position: relative;
}
	form button {
		width:100%;
		padding:10px;
	}
	
	form div{
		border:0px solid aqua;
		display: flex;
		font-size:20px;
	}
form img{
	cursor:pointer;
	position: absolute;
	top:0;
	right:0;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
	#rowpic{border:1px solid black;}
	#picback{display: block;object-fit:cover;height: 100%!important;}
	
	#endirim:checked + #labelend{background: black;color:white;}	




}

/* TAB */
@media only Screen and (min-width: 491px) and (max-width:991px){
img {
    vertical-align: middle;
}
/* Position the image container (needed to position the left and right arrows) */
.container {
    position: relative;
}
/* Hide the images by default */
.mySlides {
    display: none;
	height: 100%;
}
/* Add a pointer when hovering over the thumbnail images */
.cursor {
    cursor: pointer;
}
/* Next & previous buttons */
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    color: black;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
}
/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
	.prev{
		left:0;
	}
/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
    color: white;
    background-color: rgba(0, 0, 0, 0.8);
}
/* Container for image text */
.caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
}
.row {
    height: 100px;
    display: flex;
}
/* Number text (1/3 etc) */
.numbertext {
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    border: 1px solid black;
    z-index: 1;
    background: white;
}
/* Six columns side by side */
.column {
    width: 90px;
    height: 90px;
    bottom: 0;
}
/* Add a transparency effect for thumnbail images */
.demo {
    opacity: 0.6;
    object-fit: cover;
    height: 90px;
    width: 90px;
}
.active, .demo:hover {
    opacity: 1;
}
form{	
font-family: arial;
font-weight: bold;
	margin-top:30px;
	position: relative;
}
	form button {
		width:100%;
		padding:10px;
	}
	
	form div{
		border:0px solid aqua;
		display: flex;
		font-size:20px;
	}
form img{
	cursor:pointer;
	position: absolute;
	top:0;
	right:0;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
	#rowpic{border:1px solid black;}
	#picback{display: block;object-fit:cover;height: 100%!important;}
	
	#endirim:checked + #labelend{background: black;color:white;}	

}
@media only Screen and (min-width:0px) and (max-width:490px){

  
  img {
    vertical-align: middle;
}
/* Position the image container (needed to position the left and right arrows) */
.container {
    position: relative;
}
/* Hide the images by default */
.mySlides {
    display: none;
	height: 100%;
}
/* Add a pointer when hovering over the thumbnail images */
.cursor {
    cursor: pointer;
}
/* Next & previous buttons */
.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    color: black;
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
    -webkit-user-select: none;
}
/* Position the "next button" to the right */
.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}
	.prev{
		left:0;
	}
/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
    color: white;
    background-color: rgba(0, 0, 0, 0.8);
}
/* Container for image text */
.caption-container {
    text-align: center;
    background-color: #222;
    padding: 2px 16px;
    color: white;
}
.row {
    height: 100px;
    display: flex;
}
/* Number text (1/3 etc) */
.numbertext {
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
    border: 1px solid black;
    z-index: 1;
    background: white;
}
/* Six columns side by side */
.column {
    width: 90px;
    height: 90px;
    bottom: 0;
}
/* Add a transparency effect for thumnbail images */
.demo {
    opacity: 0.6;
    object-fit: cover;
    height: 90px;
    width: 90px;
}
.active, .demo:hover {
    opacity: 1;
}
form{	
font-family: arial;
font-weight: bold;
	margin-top:30px;
	position: relative;
}
	form button {
		width:100%;
		padding:10px;
	}
	
	form div{
		border:0px solid aqua;
		display: flex;
		font-size:20px;
	}
form img{
	cursor:pointer;
	position: absolute;
	top:0;
	right:0;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
  #rows{width:96% !important;left:2% !important;}
	#rowpic{border:1px solid black;height:300px !important;width:100% !important;}
	#picback{display: block;object-fit:cover;height: 100%!important;}
	
	#endirim:checked + #labelend{background: black;color:white;}	
  .rowsedit{position: absolute !important;width:100%;}
}


</style>
<div id="mainedit">
<div class="rowsedit" style="text-align: center;">
  <?php
  $sekilsayi = substr_count( $m["sekil_adi"], ";" ) + 1;
  $sekilarray = explode( ";", $m["sekil_adi"] );

  if ( $sekilsayi != 1 ) {
    $i = 1;
    ?>
  <div id = "rows" style="width: 40%;margin-left:20%;">
    <div class="container">
      <div id="rowpic">
        <?php
        foreach ( $sekilarray as $imgdata ) {
          ?>
        <div class="mySlides">
          <div class="numbertext"><?php echo $i."/".$sekilsayi;?></div>
          <img  id="picback" src="../<?php echo $imgdata;?>" style="width:100%"> <img  id="pic" src="../<?php echo $imgdata;?>" style="width:100%">
		</div>
        <?php
        $i++;
        }
        ?>
      </div>
      <div class="row">
        <?php $i=1; foreach($sekilarray as $imgdata){?>
        <div class="column" style="z-index:1;"> <img class="demo cursor" src="../<?php echo $imgdata; ?>" style="width:100%" onclick="currentSlide(<?php echo $i;?>)" alt="nowwimg"> </div>
        <?php	$i++;}?>
      </div>
      <a class="prev" onclick="plusSlides(-1)">❮</a> <a class="next" onclick="plusSlides(1)">❯</a> </div>
  </div>
  <?php
  } else {
    ?>
  <div class="rows" style="width: 40%;margin-left:20%;border:0px;">
    <div id="rowpic">
		<img id="picback"alt="img" src="../<?php echo $m["sekil_adi"];?>" style="width:100%"> <img id="pic"alt="img" src="../<?php echo $m["sekil_adi"];?>" style="width:100%">
	  </div>
    <br>
  </div>
  <?php
  }
  ?>
	
</div>
<div id="mainrightedit">
  <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=ad">
    <div> <a id="editaa1"><?php echo strtoupper($m["ad"]);?></a><br>
      <input type="text" maxlength="17" id="editinput1"required name="postname"/>
      <img alt="" id="editimg1" src="../img/iconfinder_edit-3_2561260.svg" style="width:20px;height:20px;"> </div>
    <br>
    <button id="editsubmit1" style="background:black;color:white;border:0;outline:none;font-weight:bold;border-radius:0;cursor:pointer;" type="submit" >YENİLƏ</button>
  </form>
  <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=qiymet">
    <div> <a id="editaa2"><?php if($m["endirim"]==1){echo"<strike>".$m["endirimsiz"]."</strike><b> ".$m["endirimli"]."</b>";}else{echo $m["qiymet"];}?>AZN</a><br>
      <input type="number" id="editinput2"required name="qiymet"/>
      <img alt="" id="editimg2" src="../img/iconfinder_edit-3_2561260.svg" style="width:20px;height:20px;"> </div>
    <br>
    <button id="editsubmit2" style="background:black;color:white;border:0;outline:none;font-weight:bold;border-radius:0;cursor:pointer;"type="submit" >YENİLƏ</button>
  </form>
	<?php if(!empty($m["sizevalue"])){?>
  <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=size">
    <div> <a id="editaa3"><?php echo strtoupper($m["sizevalue"]);?></a><br>
      <input type="text" id="editinput3"required name="size"/>
      <img alt="" id="editimg3" src="../img/iconfinder_edit-3_2561260.svg" style="width:20px;height:20px;"> </div>
    <br>
    <button id="editsubmit3" style="background:black;color:white;border:0;outline:none;font-weight:bold;border-radius:0;cursor:pointer;"type="submit" >YENİLƏ</button>
  </form>
	<?php }?>
	<div style="display:none;">
		 <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=size">
    <div> <a id="editaa3"><?php echo strtoupper($m["sizevalue"]);?></a><br>
      <input type="text" id="editinput3"required name="size"/>
      <img alt="" id="editimg3" src="../img/iconfinder_edit-3_2561260.svg" style="width:20px;height:20px;"> </div>
    <br>
    <button id="editsubmit3" style="background:black;color:white;border:0;outline:none;font-weight:bold;border-radius:0;cursor:pointer;"type="submit" >YENİLƏ</button>
  </form>
	</div>
  <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=aciqlama">
    <div> <a style="max-width: 90%;word-wrap: break-word;" id="editaa4"><?php echo strtoupper($m["aciqlama"]);?></a><br>
      <textarea type="text" style="resize:none;font-size:28px;min-height: 200px;max-height: 200px;max-width:98%;min-width: 98%;"name="aciqlama" id="editinput4" required maxlength="150" name="size">
      </textarea>
      <img alt="" id="editimg4" src="../img/iconfinder_edit-3_2561260.svg" style="width:20px;height:20px;"> </div>
    <br>
    <button id="editsubmit4" style="background:black;color:white;border:0;outline:none;font-weight:bold;border-radius:0;cursor:pointer;"type="submit" >YENİLƏ</button>
  </form>
  <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=number">
    <div> <a id="editaa5">+<?php echo $m["number"];?></a><br>
      <input type="number" id="editinput5"required name="number"/>
      <img alt="" id="editimg5" src="../img/iconfinder_edit-3_2561260.svg" style="width:20px;height:20px;"> </div>
    <br>
    <button id="editsubmit5" style="background:black;color:white;border:0;outline:none;font-weight:bold;border-radius:0;cursor:pointer;"type="submit" >YENİLƏ</button>
  </form>
  <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=katogory">
    <div> <a id="editaa6"><?php echo strtoupper($m["cins"]);?> -> </a> <a id="editaa7"><?php echo strtoupper($m["katogory"]);?></a><br>
      <div id="editinput6"><br>
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
      <img alt="" id="editimg6" src="../img/iconfinder_edit-3_2561260.svg" style="width:20px;height:20px;"> </div>
    <br>
    <button id="editsubmit6" style="background:black;color:white;border:0;outline:none;font-weight:bold;border-radius:0;cursor:pointer;" type="submit" >YENİLƏ</button>
  </form>
  <form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=endirim" >
    <input type="checkbox" id="endirim" style="margin-bottom:20px;display: none;">
    <LABEL for="endirim" id="labelend" style="border:1px solid black;padding:10px;cursor: pointer;">ENDIRIM</LABEL><br>
    <div id="endirimalt" class="altkatog" style="margin-top:20px;"> <a style="margin-right:5PX;">ƏVVƏLKİ QİTMƏT</a>
      <input required type="number" name="endirimsiz" min="0" id ="oldval" style=" outline:none;border:1px solid black;font-size:20px;width:10%;margin-left:7PX;margin-bottom:15px;"> AZN
      <br>
      ENDİRİMLİ QİYMƏT
      <input required type="number" name="endirimli" min="0" id ="newval" style=" outline:none;border:1px solid black;font-size:20px;width:10%;margin-bottom:15px;"> AZN
      <br>
    </div>
    <button  id="gonderbtn" type="submit" style="background:black;color:white;cursor:pointer;display:none;font-weight: bold;outline: none;border:0px;">GÖNDƏR</button>
  </form>

	<?php if($m["endirim"]==1){?>
	<form method="post" action="edit.php?id=<?php echo $m["id"];?>&doedit=endirimdelete">
	<div>
	<input type="hidden" name="number"/>
	</div><br>
	<button type="submit" style="background: black;color:white;padding:10px;outline:none;font-size: 14px;border:0;cursor: pointer;font-weight: bold;">ENDİRİMİ LƏĞV ET</button>
	</form>
	<?php } ?>	

</div>
</div>
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
<?php
}
} else {
  echo "Bu postda dəyişiklik edə bilmərsiz!";
}
} else {
  echo "Bu post movcud deyil";
}

} else {
  header( "location:../login" );
}
?>
<script src="style.js?v=<?php echo time();?>" type="text/javascript"></script>
<?php
}
?>
