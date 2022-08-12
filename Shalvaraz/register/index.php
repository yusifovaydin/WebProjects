<!DOCTYPE html>
<html lang="az">
<head>
	
	<meta charset="UTF-8">
	<title>QEYDİYYAT</title>
	<link  rel ="shorcut icon" type = "image/x-icon" href="../img/pdffff.jpg" >
	<link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylephon.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link  rel ="shorcut icon" type = "image/x-icon" href="../img/pdffff.jpg" >
</head>
<body>
		<?php
		include("../mysql.php");
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
	
		//include("setting.php");
		$db = new mysqli($host,$usern,$userp,$dbname);
		if($_POST){
			$ad    = trim($_POST["ad"]);	
			$soyad = trim($_POST["soyad"]);	
			$sifre = trim($_POST["sifre"]);	
			$email = trim($_POST["email"]);	
			$kod   = md5(rand(0,99990));	
			
			$check = $db->query("SELECT * FROM istifadeciler WHERE uzv_email='$email'");
			$res = mysqli_num_rows($check);
			if($res === 1){
				echo "<div class='alert alert-warning'>Bu email artıq qeydiyyatdan keçib</div>";
				include("regs.html");
			}else{
			include("setting.php");
			$daxil = $db->prepare("insert into istifadeciler set
					
							uzv_adi=?,
							uzv_soyadi=?,
							uzv_sifre=?,
							uzv_email=?,
							uzv_kod=?
					
					");
					
			$ok = $daxil->execute(array($ad,$soyad,$sifre,$email,$kod));

			if($ok){
					

				require 'PHPMailer/src/Exception.php';
				require 'PHPMailer/src/PHPMailer.php';
				require 'PHPMailer/src/SMTP.php';
			

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
					$mail->addAddress($email, 'NOWW SHOPPING');     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
					$mail->addReplyTo($email,$ad);
		
					// Attachments
					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

					// Content
					$mail->isHTML(true);                                  // Set email format to HTML
					$mail->Subject = 'ADELDO STORE İstifadəçi təsdiq kodu';
					$mail->Body    = "<div style='background:#eee;padding:15px;width:100%; '>Email: ".$email."<br>Link: 
					
					http://www.shalvar.store/register/tesdiq.php?email=".$email."&kod=".$kod."
					
					</div>";
					
					
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					$mail->send();
				//	if($mail->send()){}
					echo "<div style='margin-top:60px;width:100%;padding:2%;background:white;color:black;font-weight:bold;font-size:20px;text-align:center;'>Hesabınızın təsdiq olunması üçün email adresinizə kod göndərildi.</div><style>html{width:100%;height:100%;}body{background:url('../img/successs2.jpg') no-repeat;background-size: cover;}</style>";
						} catch (Exception $e) {
					echo "<div class='alert alert-warning'>KOD GÖNDƏRİLDİ. LAKİN EMAİL SEHV OLA BİLƏR. KODU ALMASANIZ YENİDƏN CEHD EDİN.</div>";
					include("regs.html");
					}
						
				}else{
					echo "<div class='alert alert-danger'>QEYDİYYATDAN KEÇƏRKƏN XƏTA BAŞ VERDİ...</h2>";
					include("regs.html");
				}
			}

			}else{
				include("regs.html");
			}
		
		?>
	<script type="text/javascript" src="regs.js?v=<?php echo time(); ?>"></script>
</body>
</html>