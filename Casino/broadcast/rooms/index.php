<?php

$id = $_GET["id"];
include("../../server.php");
$db = new mysqli($host,$uname,$dbpass,$dbname);
$data = $db->query("SELECT *  FROM live WHERE id = '$id' ");
foreach($data as $alldata){
    $link = $alldata["live_link"];
}
?>
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet"/>
    <title>Casino</title>
</head>
<body>
    <div id="header">
        <a href="../../">casino</a>
        
        
    </div>
    <div id="main">
        <div id="mainleft">
            <div id="livestream">
                <video src="<?php echo $link; ?>" controls ></video>
            </div>
        </div>      
         
    </div>
</body>
</html>