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
    <title>ADMIN LOGIN</title>
</head>
<body>
    <?php 
    if(empty($_SESSION["admin"])){
        if($_POST){ 
            $uname = $_POST["username"];
            $upass = $_POST["userpass"];
                if($uname == "aydin" && $upass == "123"){
                    $_SESSION["admin"] = "aydin";
                }else{
                    echo "ERROR";
                }
        } ?>

   <div id="main">
       <form action="./" method="post">
            <div><label for="username">AD: </label><input type="text" id="username" name="username"></div>
            <div><label for="userpassword">ŞİFRƏ: </label><input type="text" id="userpassword" name="userpass"></div>
            <button type="submit">LOGIN</button>
        </form>
   </div>
   
   <?php }else{
       header("Location:./postshare/index.html");
    }
    ?>
</body>
</html>