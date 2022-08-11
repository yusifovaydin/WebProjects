<?php 
include("../../server.php");
$db = new mysqli($host,$uname,$dbpass,$dbname);

if($_FILES){

$fileuzanti = substr($_FILES["jpg"]["name"],-4,4);
$fileadi    = uniqid().$fileuzanti;	
$fileyolu   = "../../jpg/".$fileadi;	

$yukle = move_uploaded_file($_FILES["jpg"]["tmp_name"],$fileyolu);

$upload = $db->query("insert into ads set link='$fileyolu' ");

header("Location:./slideupload.php");

}else{?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Upload</title>
    <style>
        html,body{margin:0;}
        form{display:flex;align-items:center;justify-content:center;padding:20px}
        form button{background:#636bf8;font-weight:bold;outline:none;border:0;padding:20px;color:white;font-family:arial;}
        #jpgs{display:grid;grid-template-columns:auto auto;grid-gap: 10px;width:100%}
        #jpgdiv{border:2px solid #444;position:relative;height:200px;margin-top:20px}
        #jpgdiv img{width:100%}
        #jpgdd{background:red;width:94%;height:20px;font-weight:bold;font-family:arial;color:white;display:flex;justify-content:center;padding:3%}
    </style>
</head>
<body>
    <form action="./slideupload.php"  method="POST" enctype="multipart/form-data">
    <input type="file" name="jpg"><br>
    <button type="submit">Yukle</button>
    </form>

    <div id="jpgs">
        <?php $jpgs = $db->query("SELECT * FROM ads");
        foreach($jpgs as $alljpg){?>
        <div id="jpgdiv">
            <img src="<?php echo $alljpg['link'];?>" alt="">
            <div id="jpgdd" onclick="location.href='./deletefiles.php?type=jpg&link=<?php echo $alljpg['link'];?>'">Sil</div>
        <?php  }?>
        </div>
        
    </div>
    
</body>
</html>

<?php }?>