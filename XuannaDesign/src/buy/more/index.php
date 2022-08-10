<?php 
 if($_GET){

 
include("../../../server.php");
$db = new mysqli($host,$usern,$userp,$dbname);

$id = $_GET["post"];

$data = $db->query("SELECT * FROM products WHERE id='$id'");

foreach($data as $alldata){
    $name = $alldata["name"];
    $price = $alldata["price"];
    $link = $alldata["photoway"];
    }


    $sekilsayi = substr_count( $link, ";" ) + 1;
    $sekilarray = explode( ";", $link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $name; ?></title>
    <link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
    <link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="styletest.css?v=<?php echo time(); ?>">
  	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
  	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylemob.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class = "logo" onclick="location.href='../../'">
		<h1 id = "xuanna">XUANNA</h1>
		<h1 id = "design">D&nbsp; &nbsp;E&nbsp; &nbsp;S&nbsp; &nbsp;I&nbsp; &nbsp;G&nbsp; &nbsp;N</h1>
	</div>

    <div id="main">

    <div class="w3-content" id="leftdiv">
    <div id="leftimg">

    <img class="mySlides" src="<?php echo "../../../$sekilarray[1]"; ?>" style="width:100%;">
    <?php
      if($sekilsayi != 1){
        for($i=2;$i<$sekilsayi;$i++){
        ?>
        <img class="mySlides" src="<?php echo "../../../$sekilarray[$i]"; ?>" style="width:100%;display:none">
    <?php  } } ?>         
    </div>
  
  <div id="divimgsright">
  <?php 
  for($j=1;$j<$sekilsayi;$j++){
  ?>
    <div>
      <img class="demo w3-opacity w3-hover-opacity-off" id="imgsright" src="<?php echo "../../../$sekilarray[$j]"; ?>" onclick="currentDiv(<?php echo $j;?>)">
    </div>
  
  <?php } ?>

    
    
     </div>
    </div>

    <div id="right">
        <form action="./order/index.php" method="post">
            <a>YUMURU BOĞAZ</a><br>
            <a>QISA QOL</a><br>
            <a>QARA</a><br>
            <select name="size">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select><br>
            <input type="number" min="1" value="1" name="count" id="incount">
            <input type="hidden" value="<?php echo $price;?>" id="price" >
            <div id="rightprice"><h3 id="resprice"><?php echo $price;?><h3>&nbsp; AZN</h3></h3></div><br>
            <input type="hidden" name="forprice" id="forprice">
            <input type="hidden" name="name" value="<?php echo $name;?>">
            <button type="submit">SİFARİŞ ET</button>
        </form>
    </div>

    </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
    $("#forprice").val($("#incount").val()*$("#price").val());
     $("#incount").on('keyup mouseup',function(){
      $("#forprice").val($("#incount").val()*$("#price").val());
      resprice.innerHTML = $("#forprice").val();
    });

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}
</script>

</body>
</html>
<?php 
}else {
    echo "Duzgun yonlenme bash vermedi!";
}
?>