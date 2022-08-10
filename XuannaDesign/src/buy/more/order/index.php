<?php
    if($_POST){
   
    $ordname = $_POST["name"];
    $ordprice = $_POST["forprice"];
    $ordcount = $_POST["count"];
    $ordsize = $_POST["size"];
    
}else{
    echo "Yanlış yönlənmisiniz!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" type="text/css" media="(min-width: 992px) and (max-width:160000px)" href="style.css?v=<?php echo time(); ?>">
  	<link rel ="stylesheet" type="text/css" media="(min-width: 491px) and (max-width:991px)" href="styletab.css?v=<?php echo time(); ?>">
  	<link rel ="stylesheet" type="text/css" media="(min-width:0px) and (max-width:490px)" href="stylemob.css?v=<?php echo time(); ?>">
</head>
<body>
    <div id="header">
        <p>Ödəniş ilə bağlı sualınız  və ya çətinliyiniz varsa əlaqə saxlayın <y0>+994 70 860 42 65  +994 55 461 9337</y0></p>
    </div>
    <div class = "logo" onclick="location.href='../../../'">
		<h1 id = "xuanna">XUANNA</h1>
		<h1 id = "design">D&nbsp; &nbsp;E&nbsp; &nbsp;S&nbsp; &nbsp;I&nbsp; &nbsp;G&nbsp; &nbsp;N</h1>
	</div>
    <div id="main">
        <div id="mtop">
            <div><img src="../../../../images/right.png" alt="img" id="img1"><a id="f1">Ödənişi online edəcəm</a></div>
            <div><img src="../../../../images/right.png" alt="img" id="img2"><a id="f2">Ödənişi terminal vasitəsilə edəcəm</a></div>
        </div>
        <div id="mbottom">
            <div id="mbottomleft">
                <h3 id="h1">Kapital Bank<br>
                    <y>5103 0715 0109 8145</y> &nbsp;      07/23<br>
                    Beynəlxalq Bank<br>
                    <y>5167 5133 4385 6837</y>&nbsp;      10/22<br>
                    sizə uyğun bankın hesab nömrəsinə ödəniş etdikdən sonra qəbzin ekran görüntüsünü 
                    +994 70 860 42 65 nömrəsinə göndərin
                </h3>
                <h3 id="h2">1.Bank Xidmətləri bölməsinə daxil  olun<br>
                    2.Kapital Bank yazılan bölməyə keçid edin<br>
                    3.Hesaba pul artımaq<br>
                    4.Hesab nömrəsini <y>5167 5133 4385 6837</y><br> 
                    5.İrəli düyməsinə iki dəfə toxunduqdan sonra pulu daxil edin və irəli keçid edin<br>
                    6.Qəbzi əldə edin və şəkilini çəkib<br>
                     + 994 70 860 42 65 nömrəsinə göndərin                    
                </h3>
                <div class="locdiv" id="loc1"><div><img src="../../../../images/checked.png" alt="img"></div><label for="loc1">Azərbaycan daxili Bakıdan kənar bölgələr (+3 AZN)</label></div><br> 
                <div class="locdiv" id="loc2"><div><img src="../../../../images/checked.png" alt="img"></div><label for="loc2">Azərbaycandan kənar ölkələr (+10 AZN)</label></div> 

            </div>
            <div id="mbottomright">
                <form action="./send/index.php" method="POST">
                <f>AD : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</f><input type="text" maxlength="22" name="uname" required><br>
                <f>ƏLAQƏ : &nbsp;&nbsp;</f><input type="text" maxlength="22" required name="ucontact"><br>
                <f id="locc">ÜNVAN : &nbsp;&nbsp;</f><textarea maxlength="132" required name="ulocation"></textarea><br>
                <span id="span"></span>
                <a><v id="val"><?php echo $ordprice;?></v> AZN</a><br>
                <input type="hidden" name="name" value="<?php echo $ordname; ?>">
                <input type="hidden" name="price" value="<?php echo $ordprice;?>">
                <input type="hidden" name="count" value="<?php echo $ordcount;?>">
                <input type="hidden" name="size" value="<?php echo $ordsize;?>">
                <button type="submit">SİFARİŞİ TAMAMLA</buttontype>
                </form>
            </div>
        </div>
    </div>
    <script src="style.js" type="text/javascript" ></script>
</body>
</html>