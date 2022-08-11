<?php 

session_start();

if($_POST){

    include("../../server.php");

    $db = new mysqli($host,$uname,$dbpass,$dbname);

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $con = $db->query("Select * from users");

    $check = 0;
    foreach($con as $alldata){
        if($alldata["contact"] == $email){
            $check++;
        }
    }

    if($check != 0){
        $check = 0;
       $conc = $db->query("SELECT * from users where contact = '$email'");
       foreach($conc as $pasw){
           if($pasw["password"] == $pass){
               if($pasw["confrim"] == 1){
                $_SESSION["name"] = $pasw["name"];
                $_SESSION["proffs"] = $pasw["proffesion"];
                $_SESSION["phone"] = $pasw["phone"];
                $_SESSION["email"] = $pasw["contact"];
                $_SESSION["profileph"] = $pasw["profileph"];
                $_SESSION["point"] = $pasw["point"];
                $_SESSION["shans"] = $pasw["shans"];
                header("location:../Home");
               }else{
                   echo "Hesabınız nəzarətçi tərəfindən təsdiqlənməlidir!";
               }
           }else{
               echo "Şifrə yanlış daxil edilib";
           }
       }
    }else{
        echo "Email tapilmadi!";
    }

}else{ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <img onclick="location.href='../../'" id="back" src="../img/back.png" alt="img">
    <div id="mid">
        <form action="./" method="POST">
        <div id="mail">
            <h4>Email</h4>
            <div>
                <img src="../img/email.png" alt="img">
                <input type="text" name="email" required>
            </div>
            
        </div>
        <div id="pass">
            <h4>Password</h4>
            <div>
                <img src="../img/key.png" alt="img">
                <input type="password" name="pass" required>
            </div>        
        </div>
        <h4 onclick="location.href='../Reset'">Şifrənizi unutdunuz?</h4>
        <button type="submit">Daxil Ol</button>
        </form>
    </div>
</body>
</html>


<?php } ?>
