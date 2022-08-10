<?php

include("../../../server.php");
$db = new mysqli($host,$usern,$userp,$dbname);

$data = $db->query("SELECT * FROM orders");

$ordc = 0;
foreach($data as $all){
    $ordc = $ordc + $all["count"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Orders</title>
</head>
<body>
    <div class = "logo" onclick="location.href='../'">
		<h1 id = "xuanna">XUANNA</h1>
		<h1 id = "design">D&nbsp; &nbsp;E&nbsp; &nbsp;S&nbsp; &nbsp;I&nbsp; &nbsp;G&nbsp; &nbsp;N</h1>
	</div>
    <div id="right">
        <div><a href="./">SİFARİŞLƏR (<?php echo $ordc; ?>)</a></div><br>
        <div><a href="../postedit">PAYLAŞIMLAR</a></div>
    </div>

    <div id="main">
    <?php 
       foreach($data as $alldata){ 
        
        ?>
        <div id="orders">
            <div id="top"><div id="tleft"><h3 style="color:#E28B1A;"><?php echo $alldata["name"];?> (<?php echo $alldata["count"];?>)</h3> <h3 style="color:#E28B1A;font-style:italic;font-weight:normal"> &nbsp;<?php echo $alldata["size"]; ?></h3></div><div id="tright"><h3 style="color:#E28B1A;font-style:italic;font-weight:300;"><?php echo $alldata["price"];?> AZN </h3><h3 style="font-style:italic;font-weight:300;"> &nbsp;<?php echo $alldata["date"]; ?></h3></div></div>
            <div id="bottom"><div id="bleft"><h3><?php echo $alldata["user"] ?> &nbsp;&nbsp;</h3><h3><?php echo $alldata["contact"];?></h3></div><div id="bright"><h3 style="overflow: hidden;text-overflow: ellipsis;"><?php echo $alldata["location"];?></h3></div></div>
        </div>
        
        <?php } ?>
    </div>
</body>
</html>