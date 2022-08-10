<?php 

    include("../../../server.php");


    if($_FILES){


        $prodname = $_POST["prodname"];
        $prodprice = $_POST["prodprice"];
    
        $imgcnt = count($_FILES["sekil"]["tmp_name"]);	
        
        $imgway = "";

		if($imgcnt>6){
			echo "Maksimum 6 sekil elave ede bilersiniz";
		}else{
			for($i=0;$imgcnt>$i;$i++){
				
				$fileuzanti = substr($_FILES["sekil"]["name"][$i],-4,4);
				$fileadi    = uniqid().$fileuzanti;	
				$fileyolu   = "images/".$fileadi;	
	
				$sekilTipi  = $_FILES["sekil"]["type"][$i];	
				$sekilSize  = $_FILES["sekil"]["size"][$i];	
					
				if($i+1 != $imgcnt){
					$imgway = $imgway.";".$fileyolu;
				}else{
					$imgway = $fileyolu.$imgway;
				}
				
				$yukle = move_uploaded_file($_FILES["sekil"]["tmp_name"][$i],"../../../".$fileyolu);
			}
		}
        
        $db = new PDO($pdo,$usern,$userp);

        $saxla = $db->prepare("insert into products set
					
						name=?,
						price=?,
						photoway=?
					
					"); 
					
				$saxla->execute(array($prodname,$prodprice,$imgway));
			

                if($saxla && $yukle){
                    echo "<h2 style='width:100%;height:100%;color:white;font-family:Segoe UI;font-size:40px;background:black;text-align:center;justify-content:center;display:flex;justify-content:center'>PAYLAŞILDI</h2>";
                    header("refresh: 2;./");
                }else{
                    echo "<h2>Xəta baş verdi<h2>";
                }        
		

    }else{
        echo "ERROR";
    }
       
    
?>