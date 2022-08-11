<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
</head>

<body>

<?php



if(@$_SESSION["admin"] == "true"){

    include("../../server.php");
    $db = new mysqli($host,$uname,$dbpass,$dbname);
    $us =  $db->query("Select * from users");

?>
<div id="usersdiv">
<div class="divs" onclick="location.href='./videoupload.php'">Video Yukle</div>
<div class="divs" onclick="location.href='./slideupload.php'">Slide'ye Sekil Yukle</div>
    <?php 
    foreach($us as $alldata){?>
        <div id="users">

            <div id="dtop">

                <div id="usleft">
                    <?php echo $alldata["name"];?><br>
                    <?php echo $alldata["proffesion"];?>
                </div>

                <div id="usmiddle">
                 <?php echo $alldata["contact"];?><br>
                 <?php echo $alldata["phone"];?>
                </div>
            </div>

            <div id="dbottom">

             <div>
                <form action="./accept.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $alldata["id"] ?>">
                    <button type="submit" style="color:white;background:green" onclick="">+</button>
                </form>
             </div>

             <div>
                <form action="./delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $alldata["id"] ?>">
                    <button type="submit" style="color:white;background:red">-</button>
                </form>
             </div>

            </div>
            
            
        
           
            
        </div>

   <?php
   }
    ?>
            <div style="background:red;" class="divs" onclick="location.href='./exit.php'">Cixis</div>

</div>
            
<?php   

  
}
else{

    $uname = @$_POST["uname"];
    $upass = @$_POST["upass"];
    
    if($uname == "novruzadmin321@22"){
        if($upass == "nnnnn321@123vruz"){

            $_SESSION["admin"] = "true";
            header("Location:./");

    }else{
      echo "Password yanlisdir!";
}
}else{
echo "Username yanlisdir!";
}
    
?>
<form action="./" method="POST">
<div id="logindiv">
<div id="login">
<input type="text" placeholder="Username" name="uname"><br>
<input type="password" placeholder="Password" name="upass"><br>
<button  type="submit">LOGIN</button>
</div>
</div>
</form>
<?php 
}
?>
</body>
</html>