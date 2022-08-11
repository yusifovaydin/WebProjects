<?php 

    if($_POST){

        include("../../server.php");

        $db = new mysqli($host,$uname,$dbpass,$dbname);

        $name = $_POST["uname"];
        $email = $_POST["uemail"];
        $phone = $_POST["uphone"];
        $proffs = $_POST["uproffs"];
        $pass = $_POST["upass"];
        $cpass = $_POST["upassc"];

        if($pass == $cpass){
            $con = $db->query("SELECT * from users");
            $chk = 0;
            foreach($con as $alldata){
                if($email == $alldata["contact"]){
                    $chk++;
                }
            }
            if($chk == 0){

            $db = new PDO($pdo,$uname,$dbpass);

                $daxil = $db->prepare("insert into users set
					
							name=?,
							contact=?,
                            confrim=?,
							password=?,
							proffesion=?
					
					");
					
			$ok = $daxil->execute(array($uname,$email,"0",$pass,$proffs));
            
            if($ok){
                echo "Qeydiyyatiniz ugurla basa kecdi. Daxil ola bilersiniz.";

                header("Refresh:3;url=../Login");
            }else{
                echo "Qeydiyyat ugursuz oldu!";
            }

            }else{
                echo "Bu email ile qeydiyyatdan kecilib!";
            }



        }else{
            echo("Sifre tekrar duzgun daxil edilmedi!");
        }
       
    }else{ ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>
    <img onclick="location.href='../../'" id="back" src="../img/back.png" alt="img">
    <div id="mid">
        <form action="./" method="POST">
        <div class="mail">
            <h4>Ad/Soyad</h4>
            <div>
                <img src="../img/user.png" alt="img">
                <input type="text" name="uname" required>
            </div>
            
        </div>
        <div class="mail">
            <h4>Email</h4>
            <div>
                <img src="../img/email.png" alt="img">
                <input type="text" name="uemail" required>
            </div>
            
        </div>
        <div class="mail">
            <h4>Profession</h4>
            <div>
                <img src="../img/suitcase.png" alt="img">
                <input type="text" name="uproffs" required>
            </div>
            
        </div>
        <div class="mail">
            <h4>Phone</h4>
            <div>
                <img src="../img/call.png" alt="img">
                <input type="text" name="uphone" required>
            </div>
            
        </div>
        <div class="mail">
            <h4>Şifrə</h4>
            <div>
                <img src="../img/key.png" alt="img">
                <input type="password" name="upass" required>
            </div>
            
        </div>
        <div class="mail">
            <h4>Şifrəni təkrar et</h4>
            <div>
                <img src="../img/key.png" alt="img">
                <input type="password" name="upassc" required>
            </div>        
        </div>
        <button type="submit">Qeydiyyat Ol</button>
        </form>
    </div>
</body>
</html>
<?php 
}
?>