<?php
  require 'baglan.php';
  session_start();
  if(!isset($_SESSION['login']) && !$_SESSION['login']){
    header('Location: http://localhost/Personel');
    exit;
  }
  $result = "";
  if(isset($_GET['tc']) && $_GET['tc']){
    $sql = "SELECT * FROM personel WHERE SOUNDEX(tc) LIKE CONCAT(TRIM(TRAILING '0' FROM SOUNDEX(:tc)), '%');";
    $sth = $db->prepare($sql);
    $sth->bindValue(":tc", $_GET['tc'], PDO::PARAM_INT);
    $sth->execute();
    if($sth->rowCount()){
      $result = $sth->fetchAll(PDO::FETCH_ASSOC)[0];
    }else{
      echo '<script>alert("Böyle bir kullanıcı yok.")</script>';
    }
  }
  if(isset($_POST['del']) && $_POST['del']){
    $sql = "DELETE FROM personel WHERE tc = :tc";
    $sth = $db->prepare($sql);
    $sth->bindValue(":tc", $_POST['tc'], PDO::PARAM_INT);
    $add = $sth->execute();
    if($add){
      $result = "";
      echo '<script>alert("Personel silindi.")</script>';
    }else
      echo '<script>alert("Personel silinirken bir sorun oluştu.")</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persenol Silme</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link rel="stylesheet" href="personel-delete.css">
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
    <div id="header-inner" class="container">

        <form action="" method="GET">
          <div class="personel-ara">
              <input type="text" placeholder="PERSONEL TC GİRİNİZ" name="tc">
              <input type="submit" value="BUL">
          </div>
        </form>

        <div class="silinecek-personel">

            <h3>SİLİNECEK PERSONEL</h3>

            <div class="formlar">
              <form action="" method="post" class="delete-form">
                <input type="text" name="tc" placeholder="TC KİMLİK NO" value="<?php isset($result['tc']) && !empty($result['tc']) ? print $result['tc']: null ?>" class="tcNo">
                <input type="text" placeholder="AD SOYAD" value="<?php isset($result['namelast']) && !empty($result['namelast']) ? print $result['namelast']: null ?>" class="ad-soyad" >
                <input type="hidden" name="del" value="asd">
                  <input type="submit" value="DELETE">
              </form>
            </div>


        </div>



    </div>
</div>

<div id="footer">
    <div id="footer inner" class="container">
        <span>Copyright © Your Website 2018</span>
    </div>
</div>
</body>
</html>