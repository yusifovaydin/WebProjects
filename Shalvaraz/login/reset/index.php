<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ŞİFRƏNİ UNUTDUM</title>
	<link rel ="stylesheet" type="text/css" href="reset.css?v=<?php echo time();?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php

	include("../../mysql.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	if($_POST){
		$db = new mysqli($host,$usern,$userp,$dbname);
		$email = $_POST["email"];
		$ad    = "ADELDO STORE";
		$check = $db->query("SELECT uzv_email,uzv_tesdiq,reset FROM istifadeciler WHERE uzv_email='$email' LIMIT 1");
		$link = md5(rand(100,999999));
		
		foreach($check as $alldata){
			$tesdiq = $alldata["uzv_tesdiq"];
			$prez = $alldata["reset"];
		}
		
		$res = mysqli_num_rows($check);
		if($res != 0){
			if($tesdiq == 1){
				 if($prez == 0){
			
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
					$mail->addAddress($email, 'ADELDO SHOPPING');     // Add a recipient
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
					
					echo "<div style='margin:20px' class='alert alert-warning'>$email adresinə yeniləmə kodu göndərilib...</div>";
					
				}
		
			}else{
				
				echo "<div style='margin:20px' class='alert alert-warning'>$email adresi təsdiqlənməyib...</div>";
				
			}
			
			
		}else{
			echo "<div style='margin:20px' class='alert alert-warning'>$email. adresi ilə qeydiyyat aparılmayıb</div>";
		}
	}else{
		include("reset.html");
	}


?>
</body>
</html>