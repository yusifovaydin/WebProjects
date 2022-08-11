<?php 
session_start();

if(isset($_SESSION["name"])){?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="style.css" type="text/css"  rel="stylesheet">
</head>
<body>
    <div id="all">
        <div id="main">
            <img src="../img/hometop.png" id="hometop">
            <div id="swiper" onclick="location.href='../Video'">
                 <img src="../img/gmail-online.png">
                 <a>Online Ol</a>  
            </div>
            <div id="missions">
                
              
            </div>
        </div>
        <div id="navbar">
            <div id="navhome" onclick="location.href='./'"><img src="../img/home.png" id="inbar" ></div>
            <div id="navcontact" onclick="location.href='../Contact/'"><img src="../img/headset.png" ></div>
            <div id="navrayting" onclick="location.href='../Rating/'"><img src="../img/rating.png" ></div>
            <div id="navsetting" onclick="location.href='../Setting'"><img src="../img/settings.png" ></div>
        </div>
    </div>
</body>
</html>

<?php 

}else{
    echo "Daxil olmalisiniz!";
    header("refresh:2;url=../Login/");
}

?>