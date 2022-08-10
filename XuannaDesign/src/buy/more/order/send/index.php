<?php 
if($_POST){

    $ordname = $_POST["name"];
    $ordprice = $_POST["price"];
    $ordcount = $_POST["count"];
    $ordsize = $_POST["size"];
    $uname = $_POST["uname"];
    $ucontact = $_POST["ucontact"];
    $ulocation = $_POST["ulocation"];
    


    include("../../../../../server.php");


     $db = new PDO($pdo,$usern,$userp);
        $saxla = $db->prepare("insert into orders set
						name=?,
						price=?,
					    size=?,
                        count=?,
						contact=?,
                        user=?,
                        location=?
					"); 
					
		$saxla->execute(array($ordname,$ordprice,$ordsize,$ordcount,$ucontact,$uname,$ulocation));
			
        Location("./order.html");
}else{
    header("Location:../");
}

?>