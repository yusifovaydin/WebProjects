<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  $do = $_POST["do"];
  include("../server.php");
  $db = new mysqli($host,$uname,$dbpass,$dbname);

  $email = $_POST["email"];
  @$pass = $_POST["password"];

  
  $inf = $db->query("SELECT * FROM users where contact = '$email'");
        foreach($inf as $allinf){
            $mail = $allinf["contact"];
            $pasw = $allinf["password"];
            $confrim = $allinf["confrim"];
        }

  switch($do){
      case "login":

        
        if(!isset($mail)){
            echo "Bu email qeydiyyatda deyil";
        }else{
            if($confrim == 0){
               echo "Emailiniz tesdiq olunmayib";
            }else{
                echo "giris ugurla tamamlandi";
            }      
        }        

        break;
      case "regs":
       
            $ad = $_POST["name"];

            if(isset($mail)){
                    echo "Bu mail qeydiyyatdan kecmisdir";
                    if($confrim == 0){
                        echo ", lakin hesab tesdiqlememisdir";
                    }                
            }else{
                echo "Qeydiyyat davam edir...";
            }
                
            
				
            
			$db2 = new PDO($pdo,$uname,$dbpass);

			$daxil = $db2->prepare("insert into users set
				
						name=?,
						contact=?,
						confrim=?,
						password=?,
						proffesion=?
				
				");
				
		$ok = $daxil->execute(array($usname,$usemail,"0",$uspass,$proffs));

        break;
      case "rest":
            if(isset($mail)){
               
                require 'PHPMailer/src/Exception.php';
			require 'PHPMailer/src/PHPMailer.php';
			require 'PHPMailer/src/SMTP.php';
			
			$yenile = $db->query("UPDATE istifadeciler set reset=1, reset_link='$link' WHERE uzv_email='$email'");		 
					 

				// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
					//Server settings
					//$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
					$mail->isSMTP();
					$mail->SetLanguage("tr","mailler/language");
					$mail->Host       = 'smtp.mail.ru'; 
					$mail->SMTPAuth   = true;
					$mail->CharSet    = 'utf-8';  
					$mail->Username   = 'rzaurlu@mail.ru';  
					$mail->Password   = 'aydin12@';        
					$mail->Port       = 587;                               

					//Recipients
					$mail->setFrom('rzaurlu@mail.ru', $ad);
					$mail->addAddress($email, 'SHALVAR SHOPPING');     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
					$mail->addReplyTo($email,$ad);
		
					// Attachments
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

					// Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'İstifadəçi təsdiq kodu';
					$mail->Body    = "<div style='background:#eee;padding:15px;width:100%; '>Email: ".$email."<br>TƏSDİQ KODU: 
					
					http://www.shalvar.store/login/reset/resetpass.php?email=".$email."&link=".$link."
					
					</div>";
					
					
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
				//	if($mail->send()){}
					echo '<div style="margin:20px" class="alert alert-success">Hesabınızın təsdiq olunması üçün email adresinizə kod göndərildi.</div>';
						} catch (Exception $e) {
					echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
					}	




            }else{
                echo "Bu email qeydiyyatdan kecmemisdir!";
            }
        break;    
  }
?>