<?php 

include("../../../server.php");
$db = new mysqli($host,$usern,$userp,$dbname);

$data = $db->query("SELECT * FROM orders");
$data2 = $db->query("SELECT * FROM products");

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
    <link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px) and (orientation: landscape)" href="style.css">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px) and (orientation:portrait)" href="stylemob.css">
    <title>POST EDIT</title>
</head>
<body>
<div class = "logo" onclick="location.href='../'">
		<h1 id = "xuanna">XUANNA</h1>
		<h1 id = "design">D&nbsp; &nbsp;E&nbsp; &nbsp;S&nbsp; &nbsp;I&nbsp; &nbsp;G&nbsp; &nbsp;N</h1>
	</div>
    <div id="right">
        <div><a href="../orders">SİFARİŞLƏR (<?php echo $ordc; ?>)</a></div><br>
        <div><a href="../postedit">PAYLAŞIMLAR</a></div>
    </div>

    <div id="main">
        <?php 
        foreach($data2 as $alldata){
            $sekilarray = explode( ";", $alldata["photoway"]);
            $sekilsayi = substr_count( $alldata["photoway"], ";" ) + 1;

        ?>
        <div id="mndiv">
            <img src="../../../<?php echo $sekilarray[1];?>" alt="jpg">
            <form action="./delete.php" method="POST">
                <div><a><?php echo $alldata["name"]; ?></a><img src="../../../images/edit.png" alt="jpg"></div>
                <div><a><?php echo $alldata["price"];?> AZN</a><img src="../../../images/edit.png" alt="jpg"></div>
                <input type="hidden" name="imgway" value="<?php echo $alldata['photoway'];?>">
                <button type="submit"> SIL</button>
            </form>
        </div>   
        
        <?php 
        }
        ?>
    </div>
</body>
</html>