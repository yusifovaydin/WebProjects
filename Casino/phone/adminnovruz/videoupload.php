<?php

include("../../server.php");
$db = new mysqli($host,$uname,$dbpass,$dbname);

if($_FILES){

    $title = $_POST["videoname"];
    
    $fileuzanti = substr($_FILES["video"]["name"],-4,4);
    $fileadi    = uniqid().$fileuzanti;	
    $fileyolu   = "../../mp4/".$fileadi;	

    $yukle = move_uploaded_file($_FILES["video"]["tmp_name"],$fileyolu);

    $upload = $db->query("insert into live set live_name='$title', live_link='$fileyolu' ");

    echo "<a style='width:100%;font-weight:bold;font-family:arial;font-size:16px;background:#90ee90;opacity:.6;'>Yuklendi!</a>";

    header("Refresh:2;url='./videoupload.php'");

}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Upload</title>
    <style>
         html,body{margin:0;}
        form{align-items:center;justify-content:center;padding:20px;width:90%;}
        form input{margin:10px;border:1px solid #636bf8;padding:20px;width:60%;}
        form button{background:#636bf8;font-weight:bold;outline:none;border:0;padding:20px;color:white;font-family:arial;width:100%;font-weight:bold;}
        #jpgs{display:grid;grid-template-columns:auto auto;grid-gap: 10px;width:100%}
        #jpgdiv{border:2px solid #444;position:relative;height:200px;margin-top:20px;}
        #jpgdiv video{width:100%}
        #jpgdd{background:red;width:94%;height:20px;font-weight:bold;font-family:arial;color:white;display:flex;justify-content:center;padding:3%}
    </style>
</head>

<body>
    <form action="./videoupload.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="videoname" placeholder="Video Basligi" style="width:100px;" ><br>
    <input type="FILE" name="video" required>
    <br><button type="submit">Yukle</button>
    </form>

    <div id="jpgs">
        <?php $jpgs = $db->query("SELECT * FROM live");
        foreach($jpgs as $alljpg){?>
        <div id="jpgdiv">
            <video src="<?php echo $alljpg['live_link'];?>"></video>
            <div id="jpgdd" onclick="location.href='./deletefiles.php?type=mp4&link=<?php echo $alljpg['live_link'];?>'">Sil</div>
        <?php  }?>
        </div>
        
    </div>

</body>
</html>

<?php } ?>