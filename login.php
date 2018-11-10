<?php
 session_start();
 if(isset($_SESSION['login']) && $_SESSION['login']){
   header('Location: http://localhost/Personel');
   exit;
 }
 require 'baglan.php';
 if(isset($_POST['login'])){
  if($_POST['username'] && $_POST['password']){
    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $sth = $db->prepare($sql);
    $sth->bindValue(":username", $_POST['username'], PDO::PARAM_STR);
    $sth->bindValue(":password", $_POST['password'], PDO::PARAM_STR);
    $sth->execute();
    if($sth->rowCount()){
      echo 'Giriş Başarılı';
      $login = true;
      $_SESSION['login'] = true;
      header('Location: http://localhost/Personel');
    }else
      echo 'Kullanıcı adı veya şifre boş yanlış!';
  }else
    echo 'Kullanıcı adı veya şifre boş bırakılamaz';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yapınız!</title>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link rel="stylesheet" href="login.css">

</head>
<body>
<div id="nav-container">
    <div id="nav-inner" class="container">
        <a id="logo">PERSONEL&EKLE.com</a>
        <div class="clear"></div>

    </div>
</div>
<div id="header">
    <div id="header inner" class="container">
        <h2>Personel Kayıta Hoşgeldiniz!</h2>
        <h1>Personellerle İlgili İşlemler İçin Lütfen Giriş Yapınız!</h1>
        <form action="" method="post">
          <div class="formgroup">
              <input type="text" name="username" placeholder="Kullanıcı Adı Giriniz">
          </div>
          <div class="formgroup">
              <input type="password" name="password" placeholder="Şifre Giriniz">
          </div>
          <div>
            <input type="submit" id="btn" name="login" value="Giriş">
          </div>
        </form>
    </div>
</div>
<div id="footer">
    <div id="footer inner" class="container">
        <span>Copyright © Your Website 2018</span>
    </div>
</div>
</body>
</html>