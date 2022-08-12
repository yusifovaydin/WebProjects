<?php 
include("../mysql.php");
session_start();
$db = new mysqli($host,$usern,$userp,$dbname);
if(@$_SESSION["ad"]){
	?>
	<!DOCTYPE html>
<html lang="en"  manifest="cache.manifest">
<head>
	 <meta http-equiv='cache-control' content='no-cache'> 
	<meta http-equiv='expires' content='0'> 
	<meta http-equiv='pragma' content='no-cache'>
	<link  rel ="shorcut icon" type = "image/x-icon" href="../img/pdffff.jpg" >
	<link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylephon.css?v=<?php echo time(); ?>">
	<title>PROFIL</title>
</head>
<body>
	<?php
	include("header.php");
	$do = @$_GET["do"];
	switch($do){
	case "sil":
		include("sil.php");
		break;
	case "duzelt":
		include("edit.php");
		break;
	default:
		include("profile.php");
		break;
	}

	include("footer.html"); 

	?>
	<script src="style.js?v=<?php echo time();?>" type="text/javascript"></script>
	<script type="text/javascript">
	postmain.style.display="block";
	accountmain.style.display="none";
	posts.addEventListener("click",function(){
		if(postmain.style.display==="none"){
			postmain.style.display="block";
		}else{
			postmain.style.display="none";
		}
		accountmain.style.display="none";

	});
	account.addEventListener("click",function(){
		if(accountmain.style.display==="none"){
			accountmain.style.display="block";
		}else{
			accountmain.style.display="none";
		}
			postmain.style.display="none";		
	});
	</script>
	
</body>
</html>
	<?php
}else{
	header("refresh:0;../login");
}
?>

