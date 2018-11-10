<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persenol&Ekle.com</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="nav-container">
        <div id="nav-inner" class="container">
            <a href="/Personel" id="logo">PERSONEL&EKLE.com</a>
            <div class="exit">
              <?php
                if(isset($_SESSION['login']) && $_SESSION['login']){
              ?>
                <span><a href="logout.php" class="off">Çıkış Yap</a></span>
              <?php
                }else{
              ?>
                <span><a href="login.php" class="off">Giriş Yap</a></span>
              <?php
                }
              ?>
                
                <a href="login.html" class="off"><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </div>
            <ul id="nav-menu">
                <li>
                    <a href="/Personel">ANASAYFA</a>
                </li>
                <li>
                    <a href="personel-list.php">PERSONEL LİSTELE</a>
                </li>
                <li>
                    <a href="personel-add.php">PERSONEL EKLE</a>
                </li>
                <li>
                    <a href="personel-update.php">PERSONEL GÜNCELLE</a>
                </li>
                <li>
                    <a href="personel-delete.php">PERSONEL SİL</a>
                </li>
            </ul>
            <div class="clear"></div>

        </div>
    </div>
    
    <div id="header">
        <img src="personel.jpg" alt="">
    </div>
    
    <div id="footer">
        <div id="footer inner" class="container">
            <span>Copyright © Your Website 2018</span>
        </div>
    </div>
</body>
</html>