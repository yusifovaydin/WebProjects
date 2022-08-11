<?php 
$name = $_GET["name"];
$link = $_GET["link"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo $name; ?></title>
    <style>
        html,body{margin:0;padding:0;height:100%}
        div{width:100%;background:black;height:100%;display:flex;}
    </style>
</head>
<body>
    <div>
    <video style="width:100%;margin:auto" src="<?php echo $link;?>" autoplay controls></video>
    </div>
</body>
</html>