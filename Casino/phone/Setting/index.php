<?php 
session_start();

if(isset($_SESSION["name"])){?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link href="style.css" type="text/css"  rel="stylesheet">
</head>
<body>
    <div id="all">
        <div id="main">
            <div id="mtop">
                <div id="mtopu">
                    <div id="mtopul"><img src="<?php
                    if(empty($_SESSION["profileph"])){
                        echo "../img/userphoto.jpg";
                    }else{
                        echo $_SESSION["profileph"];
                    }                    
                    ?>" alt="img"></div>
                    <div id="mtopur"><h4><?php echo $_SESSION["name"];?></h4><h5><?php echo $_SESSION["proffs"];?></h5></div>
                </div>
                <div id="mtopd">
                    <div><img src="../img/call.png" alt="img"><?php echo $_SESSION["phone"]; ?></div>
                    <div><img src="../img/email.png" alt="img"><?php echo $_SESSION["email"]; ?></div>
                </div>
            </div>
           
            <div id="mbtm">
                
                <div id="logout" onclick="location.href='./exit.php'" ><img src="../img/off-button.png" alt="img">Çıxış</divi>
            </div>
            
        </div>
        <div id="navbar">
            <div id="navhome" onclick="location.href='../Home'"><img src="../img/home.png"  ></div>
            <div id="navcontact" onclick="location.href='../Contact'"><img src="../img/headset.png" ></div>
            <div id="navrayting" onclick="location.href='../Rating'"><img src="../img/rating.png" ></div>
            <div id="navsetting" onclick="location.href='./'"><img src="../img/settings.png" id="inbar" ></div>
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