<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MƏHSUL ƏLAVƏSİ</title>
	<link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="add.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylephon.css?v=<?php echo time(); ?>">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link  rel ="shorcut icon" type = "image/x-icon" href="../img/pdffff.jpg" >
</head>
<body>
	<?php		
	
	include("setting.php");
	
		$do = @$_GET["do"];
			
			switch ($do) {
					
				case "sil":
					include("sil.php");
					break;
				
				case "duzelt":
					include("duzelt.php");
					break;
				
				default:
					include("add.php");
					break;
					
			}
			
	
	?>
	<script src="add.js?v=<?php echo time();?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#mainform").on("submit",function(){
				$.ajax({
					url:"add.php",
					data: new FormData(this),
					type: "POST",
					processData: false,
					cache: false,
					contentType: false,
					success: function(row){
					 alert(row);	
					}
				});
			});
		});
		
	</script>
</body>
</html>