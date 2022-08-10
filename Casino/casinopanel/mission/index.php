<?php 
    include("../../mysql.php");
   
    if($_FILES){
        if(!empty($_FILES["back"])){

            $db = new mysqli($host,$usern,$userp,$data);

            $adsdata = $db->query("SELECT * From miss_ads");
            foreach($adsdata as $adsall){
                $backads = $adsall["ads_back"];
                $logoads = $adsall["ads_logo"];
            }
            
            $adsback = "images/".uniqid().substr($_FILES["back"]["name"],-4,4);
            $adslogo = "images/".uniqid().substr($_FILES["adslogo"]["name"],-4,4);
            $adsname = $_POST["adsname"];
            $adsabout = $_POST["adsabout"];
            $adstype = $_POST["adstype"];
            $ios1 = $_POST["ios1"];
            $andr1 = $_POST["andr1"];
            $point1 = $_POST["point1"];

            move_uploaded_file($_FILES["back"]["tmp_name"],"../../".$adsback);
            move_uploaded_file($_FILES["adslogo"]["tmp_name"],"../../".$adslogo);

            $db->query("UPDATE miss_ads set 
                        ads_name='$adsname',
                        ads_target='$adsabout',
                        ads_platform='$adstype',
                        ads_back='$adsback',
                        ads_logo='$adslogo',
                        ads_xal='$point1',
                        ads_andr='$andr1',
                        ads_ios='$ios1'
                        ");

        }else{

            $db= new PDO($pdo,$usern,$userp);

            $missname = $_POST["misname"];
            $misstarget = $_POST["mistarget"];
            $misstype = $_POST["mistype"];
            $ios2 = $_POST["ios2"];
            $andr2 = $_POST["andr2"];
            $missxal = $_POST["point2"];

            $logouznt = substr($_FILES["logo"]["name"],-4,4);
            $fileyolu = "images/".uniqid().$logouznt;

            move_uploaded_file($_FILES["logo"]["tmp_name"],"../../".$fileyolu);
           
            $setupads = $db->prepare("insert into missions set
             miss_logo = ?,
             miss_name = ?,
             miss_target = ?,
             miss_type = ?,
             miss_andr = ?,
             miss_ios = ?,
             miss_xal = ?
            ");

            $set = $setupads->execute(array($fileyolu,$missname,$misstarget,$misstype,$andr2,$ios2,$missxal));

        }
         
    }else {
?>
<!DOCTYPE html>
<html lang="en">
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
               <div onclick="location.href='../live/#live'" id="live"><img src="../../img/live.png" alt="img"><a href="live/#live">Live</a></div>
               <div onclick="location.href='#mission'" id="mission"><img src="../../img/mission.png" alt="img"><a href="mission/#mission">Missions</a></div>
               <div onclick="location.href='../bonus/#bonus'" id="bonus"><img src="../../img/bonus.png" alt="img"><a href="bonus/#bonus">Bonus</a></div>
               <div onclick="location.href='../news/#news'" id="news"><img src="../../img/news.png" alt="img"><a href="news/#news">News</a></div>
    </div>
     </div>
     <div id="main">

        <h4>One cixan</h4>
        <form action="./#mission" method="post" enctype="multipart/form-data">
        <label for="back">Arxa fon sekili</label>
            <input type="file" accept=".jpg,.png" name="back" id="back">
        <label for="adslogo">Logo</label>
            <input type="file" name="adslogo" accept=".jpg,.png" id="adslogo"> 
            <input type="text" name="adsname" placeholder="Adi">
            <input type="text" name="adsabout" placeholder="Aciqlama">
            <input type="text" name="adstype" placeholder="Pragram novu">
        <input type="hidden" name="ios1" value="0" />      
        <input type="checkbox" name="ios1" value="1" id="ios1"><label id="ios1" for="ios1">IOS</label>
        <input type="hidden" name="andr1" value="0" />   
        <input type="checkbox" name="andr1" value ="1" id="android1"><label id="andr1" for="android1">ANDROID</label>
        <input type="text" name="point1" id="xal1" placeholder="Qazanacagi xal">
        <button type="submit">PAYLAS</button>
        </form>

        <h4>Missions</h4>
        <form action="./#mission" method="post" id="form2" enctype="multipart/form-data">
        <label for="mislogo">Logonu yukle</label>
            <input type="file" required name="logo" accept=".jpg,.png" id="mislogo" class="ads">
            <input type="text" required name="misname" placeholder="Adi" class="ads">
            <input type="text" required name="mistarget" placeholder="Misianin meqsedi" class="ads">
            <input type="text" required name="mistype" placeholder="Programin novu" class="ads">
        <input type="hidden" name="ios2" value="0" />    
        <input type="checkbox" name="ios2" value="1" id="ios2"><label id="ios2" for="ios2">IOS</label>
        <input type="hidden" name="andr2" value="0" />
        <input type="checkbox" name="andr2" value="1" id="android2"><label id="andr2" for="android2">ANDROID</label> 
        <input type="text" required name="point2" id="xal2" placeholder="Qazanacagi xal">  
        <button type="submit">PAYLAS</button>
        </form>
        <div id="preview">
        
      </div>
      </div>   
    </div> 
    
</body>
 <script type="text/javascript">
// var andr1 = document.querySelector("#andr1");
// var ios1 = document.querySelector("#ios1");
// var andr2 = document.querySelector("#andr2");
// var ios2 = document.querySelector("#ios2");
// andr1.addEventListener("click",function(){
//     if(andr1.style.background == "black"){
//         andr1.style.background = "white";
//     }else{
//         andr1.style.background = "black";
//     }
// });
// ios1.addEventListener("click",function(){
//     if(ios1.style.background == "black"){
//     ios1.style.background = "white";
//     }else{
//     ios1.style.background = "black";
//     }
// });
// andr2.addEventListener("click",function(){
//     if(andr2.style.background == "black"){
//         andr2.style.background = "white";
//     }else{
//         andr2.style.background = "black";
//     }
// });
// ios2.addEventListener("click",function(){
//     if(ios2.style.background == "black"){
//         ios2.style.background = "white";
//     }else{
//         ios2.style.background = "black";
//     }
// });
</script> -->
</html>
<?php } ?>