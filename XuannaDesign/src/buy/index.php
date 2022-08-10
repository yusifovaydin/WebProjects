<?php 

    include("../../server.php");
    $db = new mysqli($host,$usern,$userp,$dbname);

    $data = $db->query("SELECT * FROM products");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylemob.css?v=<?php echo time(); ?>">
    <title>Sifariş et</title>
</head>
<body>
    <div class = "logo" onclick="location.href='../'">
		<h1 id = "xuanna">XUANNA</h1>
		<h1 id = "design">D&nbsp; &nbsp;E&nbsp; &nbsp;S&nbsp; &nbsp;I&nbsp; &nbsp;G&nbsp; &nbsp;N</h1>
	</div>
    <div id="products">
        <?php
        foreach($data as $alldata){
        $sekilarray = explode( ";", $alldata["photoway"] );
        $png = current(preg_grep('/\.png$/', $sekilarray));
        $id = $alldata["id"];
        ?>
        <div class="product" >
            <img src="<?php  echo "../../$png"; ?>" alt="img" onclick="location.href='./more/index.php?post=<?php echo $id;?>'">
            <div class="prodown">
                    <h4 style="text-align:center"><?php echo $alldata["name"]; ?></h4>
                    <h4><?php echo $alldata["price"]; ?> AZN</h4>
            </div>
        </div>
        <?php }?>
        
       
    </div>
</body>
</html>