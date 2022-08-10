<?php 
    include("../mysql.php");
    $db = new mysqli($host,$usern,$userp,$data);
    $inf = $db->query("SELECT * FROM live");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="../style.css">

</head>
<body>
    <div id="header">
        <a href="../">casino</a>
        <div id="srch">
            <label for="srchinpt"><img src = "../img/search.png" alt="img"><label>
            <input id="srchinpt" type="text" placeholder="Axtarmag istediyinizi yazin...">
        </div>
        
    </div>
    <div id="main">
        <div id="mainleft">
        <div id="navg">
                <h5>Navigation</h5>
                <div onclick="location.href='#live'"><a href="#live" id="live"><img src="../img/live.png" alt="img"/>Live Brod</a></div>
               
            </div>
        
        </div>
        <div id="mainright">
            <h5>Live Brods</h5>
            <div id="brod">
                <?php 
                $val = 0;
                foreach($inf as $chk){
                    if(empty($chk["id"])){
                        $val = 0;
                    }else{
                        $val = 1;
                    }
                }
                if($val === 0){
                    echo "Canlı yayımlar hələki aktiv olunmayıb(";
                }
                    foreach($inf as $alldata){ 
                ?>
                <div class="brodcast" onclick="location.href='./rooms?id=<?php echo $alldata['id']; ?>'"><video src="../<?php echo substr($alldata["live_link"],4); ?>"></video><img src="../img/stream.png"/><h3><?php echo $alldata["live_name"]; ?></h3><a><?php echo $alldata["live_name"]; ?></a></div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
    <?php include("../footer.php");  ?>
</body>
</html>