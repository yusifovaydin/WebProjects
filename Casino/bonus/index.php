<?php 

    include("../mysql.php");
    $db = new mysqli($host,$usern,$userp,$data);

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
        <div id="flag">
            <img src="../img/azerflag.png" alt="img" />
        </div>
        <div id="notfic">
            <img src="../img/notfbell.png" alt="img">
            <span>0</span>
        </div>
        <div id="profile">
            <img src="../images/profile.png" alt="img" />
        </div>
    </div>
    <div id="main">
        <div id="mainleft">
        <div id="navg">
                <h5>Navigation</h5>
                <div onclick="location.href='../broadcast/#live'"><a href="#live" id="live"><img src="../img/live.png" alt="img"/>Live Brod</a></div>
                <div onclick="location.href='#bonus'"><a href="#bonus" id="bonus"><img src="../img/bonus.png" alt="img"/>Bonus</a></div>
                <div onclick="location.href='../news/#news'"><a href="#news" id="news"><img src="../img/news.png" alt="img"/>News</a></div>
            </div>
        <div id="popcatg">
            <h5>Popular catogory</h5>
            <a>Poker</a><br>
            <a>BlackJack</a><br>
            <a>Rulet</a><br>
            <a>Cinema</a><br>
        </div>  
        
        </div>
        <div id="mainright">
        
        </div>
    </div>
    <?php include("../footer.php"); ?>
</body>
</html>