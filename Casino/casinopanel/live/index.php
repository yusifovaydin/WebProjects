<?php 
include("../../mysql.php");
$db= new PDO($pdo,$usern,$userp);
if($_POST){

 $name = $_POST["ad"];
 $about = $_POST["about"];
 $link = $_POST["link"];

 $ok = $db->prepare("INSERT INTO live set
  live_name = ?,
  live_aciqlama = ?,
  live_link = ?
");

  $yxl = $ok->execute([$name,$about,$link]);

if($yxl){
    echo "ok";
}else{
    echo "not ok";
}
}else{
?>
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" href="style.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
    <div id="all">
     <div id="header">
     <div id="navg">
               <div onclick="location.href='#live'" id="live"><img src="../../img/live.png" alt="img"><a href="live/#live">Live</a></div>
               <div onclick="location.href='../mission/#mission'" id="mission"><img src="../../img/mission.png" alt="img"><a href="mission/#mission">Missions</a></div>
               <div onclick="location.href='../bonus/#bonus'" id="bonus"><img src="../../img/bonus.png" alt="img"><a href="bonus/#bonus">Bonus</a></div>
               <div onclick="location.href='../news/#news'" id="news"><img src="../../img/news.png" alt="img"><a href="news/#news">News</a></div>
    </div>
     </div>
     <div id="main">
         <form action="./" method="post">
            <input type="text" required name="ad" placeholder="Canlı yayımın adı">
            <input type="text" required name="about" placeholder="Canlı yayımın acıqlaması">
            <input type="text" required name="link" placeholder="Canlı yayımın linki">
            <button type="submit">Canlı yayın yerləşdir</button>
        </form>
      </div>   
    </div> 
</body>
</html>
<?php } ?>