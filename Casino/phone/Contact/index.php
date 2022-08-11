<?php 
session_start();
if(isset($_SESSION["name"])){?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="style.css" type="text/css"  rel="stylesheet">
</head>
<body>
    <div id="all">
        <div id="main">
           <a id="con">Əlaqə saxla</a>

           <div id="contact">
            <div><img src="../img/email.png"><a>contact@10line.com</a></div>
            <div><img src="../img/call.png"><a>+99455 955 86 86</a></div>
            <div><img src="../img/placeholder.png"><a>Azerbaijan, Baku, Xazar rayonu, Bina, Ali Isazade</a></div>
           </div>
            
            <div id="iconm">
                <img src="../img/whatsapp.png">
                <img src="../img/instagram.png">
                <img src="../img/facebook.png">
            </div>
        </div>
        <div id="navbar">
            <div id="navhome" onclick="location.href='../Home'"><img src="../img/home.png" ></div>
            <div id="navcontact" onclick="location.href='./'"><img src="../img/headset.png" id="inbar"  ></div>
            <div id="navrayting" onclick="location.href='../Rating'"><img src="../img/rating.png" ></div>
            <div id="navsetting" onclick="location.href='../Setting'"><img src="../img/settings.png" ></div>
        </div>
    </div>
</body>
</html>

<?php 

}else{
    echo "Daxil olmalisiniz!";
    header("refresh:3;url:../Login");
}

?>