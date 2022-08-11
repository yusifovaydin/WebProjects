<?php 
session_start();

if(isset($_SESSION["name"])){?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Ol</title>
    <link href="style.css" type="text/css"  rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <style>
        html,
      body {
        position: relative;
        height: 100%;
      }

      body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
      }
        .swiper-container {
        width: 100%;
        height: 70%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>
</head>
<body>

<?php include("../../server.php");
$db = new mysqli($host,$uname,$dbpass,$dbname);
$data = $db->query("SELECT * FROM live");
$data2 = $db->query("SELECT * FROM ads");?>

<!-- Swiper -->
<div class="swiper-container mySwiper">
      <div class="swiper-wrapper">
          <?php foreach($data2 as $alljpg){?>
            <img class="swiper-slide" src="<?php echo $alljpg['link'] ?>" alt="img">
            <?php }?>
      </div>
      <div class="swiper-pagination"></div>
    </div>


<div id="live">
    
<?php foreach($data as $alldata){?>

    <div onclick="location.href='./video.php?name=<?php echo $alldata['live_name'];?>&link=<?php echo $alldata['live_link'] ?>'">
    <video src="<?php echo $alldata["live_link"] ?>" ></video>
    <a><?php echo $alldata["live_name"]; ?></a>
    </div>

<?php }?>

</div>

 <!-- Swiper JS -->
 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
    },
  });
</script>

</body>
</html>

<?php 
}else{
    echo "Daxil olmalisiniz!";
    header("refresh:3;url:../Login");
}
?>








