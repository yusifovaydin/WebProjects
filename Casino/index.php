<?php 
    session_start();
    include("mysql.php");
    $db = new mysqli($host,$usern,$userp,$data);
    $inf = $db->query("SELECT * FROM live");
    session_destroy();
    //$_SESSION["username"] = "SAD";
?>
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casino</title>
    <link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylephon.css?v=<?php echo time(); ?>">
    
</head>
<body>

    <div id="login">
        <form action="./account/" method="post" id="log">
            <img src="img/cancel.png" alt="close" >
            <input type="text" name="email" placeholder="Email / Phone"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <button type="submit">Daxil Ol</button><br>
            <span id="rests1">Şifrənizi unutdunuz?</span><br>
            <span id="regss1">Qeydiyyatdan keç</span>
            <input type="hidden" name="do" value="login">
        </form>   
    </div>

    <div id="regs">
    <form action="./account/" method="post">
            <img src="img/cancel.png" alt="close" >
            <input type="text" required name="name" placeholder="Name"><br>
            <input type="text" required name="proff" placeholder="Proffesion"><br>
            <input type="text" required name="email" placeholder="Email / Phone"><br>
            <input type="password" required name="password" placeholder="Password"><br>
            <input type="password" required name="passwordc" placeholder="Confrim Password"><br>
            <button type="submit">Tamamla</button><br>
            <span id="rests2">Şifrənizi unutdunuz?</span><br>
            <span id="logs1">Daxil ol</span>
            <input type="hidden" name="do" value="regs">
        </form>
    </div>

    <div id="rest">
    <form action="./account/" method="post">
            <img src="img/cancel.png" alt="close" >
            <input type="text" name="email" placeholder="Email / Phone"><br>
            <button type="submit">Gonder</button><br>
            <span id="regss2" >Qeydiyyatdan kec</span><br>
            <span id="logs2" >Daxil ol</span>
            <input type="hidden" name="do" value="rest">
    </form>
    </div>

    <div id="header">

        <a href="./">casino</a>
        
        <div id="headerleft">

       
        <?php if(isset($_SESSION["username"])){ ?>
            <div id="notfic">
            <img src="img/notfbell.png" alt="img">
            <span>0</span>
        </div>
        <?php } ?>
        <div id="profile">
            <?php if(!isset($_SESSION["username"])){?>
                <a>Daxil ol</a>
               <?php }else{ ?>
                <img src="images/profile.png" alt="img" />
                <?php }?>
        </div> 
        </div>
        
    </div>
    <div id="main">
        <div id="mainleft">
        <div id="navg">
                <h5>Navigation</h5>
                <div onclick="location.href='broadcast/#live'"><a href="#live" id="live"><img src="img/live.png" alt="img"/>Live Brod</a></div>
            </div>
        
        </div>
        <div id="mainright">
            <div id="notfc1"></div>
            <h5>Canli yayimlar</h5>
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
                <div class="brodcast" onclick="location.href='broadcast/rooms?id=<?php echo $alldata['id']; ?>'"><video src="<?php echo substr($alldata["live_link"],6); ?>"></video><img src="img/stream.png"/><h3><?php echo $alldata["live_name"]; ?></h3><a><?php echo $alldata["live_name"]; ?></a></div>
                
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
    <div id="phon">
        <div id="phonin">
        <img src="./phone/img/10line.gif">
        <img src="./phone/img/line.gif" id="line">
        <img src="./phone/img/10lineword.png" id="lineword">
        </div>  
        <img src="./phone/img/giris2.png" id="giris2">

        <a class="aclr" href="./phone/Login" style="display:flex;width:100%;align-items:center;justify-content:center;margin-top:40px;">Daxil Ol</a>

        <div id="regsdiv">
            <a style="position:absolute;left:5%;">online deyilsen?</a><br>
            <a style="position:absolute;left:30%" class="aclr" href="./phone/Register/">Qeydiyyatdan kec</a><br>
            <a style="position:absolute;right:0">online ol ve qazan!</a>
        </div>
        
            <!--<div id="navbar">
                <div><img src = "./img/phone/Home"><a>Home</a></div>
                <div><img src = "./img/phone/"><a>Home</a></div>
                <div><img src = "./img/phone/"><a>Home</a></div>
                <div><img src = "./img/phone/"><a>Home</a></div>
            </div>-->
    </div>
    <?php include("footer.php") ?>
    <script src="style.js" type="text/javascript" ></script>
</body>
</html>