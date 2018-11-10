<?php
  require 'baglan.php';
  session_start();
  if(!isset($_SESSION['login']) && !$_SESSION['login']){
    header('Location: http://localhost/Personel');
    exit;
  }
  $result = "";
  if(isset($_GET['tc']) && $_GET['tc']){
    $sql = "SELECT * FROM personel WHERE tc = :tc;";
    $sth = $db->prepare($sql);
    $sth->bindValue(":tc", $_GET['tc'], PDO::PARAM_INT);
    $sth->execute();
    if($sth->rowCount()){
      $result = $sth->fetchAll(PDO::FETCH_ASSOC)[0];
    }else{
      echo '<script>alert("Böyle bir kullanıcı yok.")</script>';
    }
  }
  if(isset($_POST['upp']) && $_POST['upp']){
    $sql = "UPDATE personel SET 
    tc = :tc, 
    namelast = :namelast, 
    fathername = :fathername, 
    mothername = :mothername, 
    birthday = :birthday, 
    birthplace = :birthplace, 
    homeaddress = :homeaddress,
    cellphone = :cellphone,
    email = :email,
    bro_row = :bro_row, 
    blood = :blood, 
    primary_school = :primary_school, 
    middle_school = :middle_school, 
    high_school = :high_school, 
    university = :university, 
    note_u = :note_u, 
    kpss = :kpss
    WHERE tc = :wtc";
    
    $sth = $db->prepare($sql);
    $sth->bindValue(":tc", $_POST['tc'], PDO::PARAM_INT);
    $sth->bindValue(":wtc", $_GET['tc'], PDO::PARAM_INT);
    $sth->bindValue(":namelast", $_POST['namelast'], PDO::PARAM_STR);
    $sth->bindValue(":fathername", $_POST['fathername'], PDO::PARAM_STR);
    $sth->bindValue(":mothername", $_POST['mothername'], PDO::PARAM_STR);
    $sth->bindValue(":birthday", $_POST['birthday'], PDO::PARAM_STR);
    $sth->bindValue(":birthplace", $_POST['birthplace'], PDO::PARAM_STR);
    $sth->bindValue(":homeaddress", $_POST['homeaddress'], PDO::PARAM_STR);
    $sth->bindValue(":cellphone", $_POST['cellphone'], PDO::PARAM_STR);
    $sth->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(":bro_row", $_POST['bro_row'], PDO::PARAM_INT);
    $sth->bindValue(":blood", $_POST['blood'], PDO::PARAM_INT);
    $sth->bindValue(":primary_school", $_POST['primary_school'], PDO::PARAM_STR);
    $sth->bindValue(":middle_school", $_POST['middle_school'], PDO::PARAM_STR);
    $sth->bindValue(":high_school", $_POST['high_school'], PDO::PARAM_STR);
    $sth->bindValue(":university", $_POST['university'], PDO::PARAM_STR);
    $sth->bindValue(":note_u", $_POST['note_u'], PDO::PARAM_STR);
    $sth->bindValue(":kpss", $_POST['kpss'], PDO::PARAM_STR);
    $add = $sth->execute();
    if($add){
      $result = $_POST;
      echo '<script>alert("Personel Güncellendi.")</script>';
    }else
      echo '<script>alert("Personel güncellenirken bir sorun oluştu.")</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persenol Güncelleme</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <link rel="stylesheet" href="personel-update.css">
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
            <input type="text" placeholder="PERSONEL TC GİRİNİZ" value="<?php isset($_GET['tc']) && !empty($_GET['tc']) ? print $_GET['tc']: null ?>" name="tc">
            <input type="submit" value="BUL">
          </div>
        </form>
        <form action="" method="post">
        <div class="kisisel">

            <h3>KİŞİSEL BİLGİLERİ</h3>

            <div class="formlar">
                <p>Tc Kimlik No:</p>
                <input type="text" name="tc" value="<?php isset($result['tc']) && !empty($result['tc']) ? print $result['tc']: null ?>">
                <br>
            </div>

            <div class="formlar">
                <p>Ad Soyad: </p>
                <input type="text" name="namelast" class="bosluk" value="<?php isset($result['namelast']) && !empty($result['namelast']) ? print $result['namelast']: null ?>">
            </div>

            <div class="formlar">
                <p>Baba Adı: </p>
                <input type="text" name="fathername" class="bosluk" value="<?php isset($result['fathername']) && !empty($result['fathername']) ? print $result['fathername']: null ?>">
            </div>

            <div class="formlar">
                <p>Anne Adı: </p>
                <input type="text" name="mothername" value="<?php isset($result['mothername']) && !empty($result['mothername']) ? print $result['mothername']: null ?>">
            </div>

            <div class="formlar">
                <p>Doğum Tarihi: </p>
                <input type="date" name="birthday" value="<?php isset($result['birthday']) && !empty($result['birthday']) ? print  date("Y-m-d", strtotime($result['birthday'])): null ?>">
            </div>

            <div class="formlar">
                <p>Dogum Yeri: </p>
                <input type="text" name="birthplace" value="<?php isset($result['birthplace']) && !empty($result['birthplace']) ? print $result['birthplace']: null ?>">
            </div>

            <div class="formlar">
                <p>Ev Adresi: </p>
                <input type="text" name="homeaddress" value="<?php isset($result['homeaddress']) && !empty($result['homeaddress']) ? print $result['homeaddress']: null ?>">
            </div>

            <div class="formlar">
                <p>Cep Telefonu: </p>
                <input type="text" name="cellphone" value="<?php isset($result['cellphone']) && !empty($result['cellphone']) ? print $result['cellphone']: null ?>">
            </div>

            <div class="formlar">
                <p>E-mail Adresi: </p>
                <input type="email" name="email" value="<?php isset($result['email']) && !empty($result['email']) ? print $result['email']: null ?>">
            </div>

            <div class="formlar">
                <p>Kardeş Sayısı: </p>
                <select name="bro_row">
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 0 ? print ' selected': null ?>>Yok</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 1 ? print ' selected': null ?>>1</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 2 ? print ' selected': null ?>>2</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 3 ? print ' selected': null ?>>3</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 4 ? print ' selected': null ?>>4</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 5 ? print ' selected': null ?>>5</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 6 ? print ' selected': null ?>>6</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 7 ? print ' selected': null ?>>7</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 8 ? print ' selected': null ?>>8</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] == 9 ? print ' selected': null ?>>9</option>
                    <option<?php isset($result['bro_row']) && !empty($result['bro_row']) && $result['bro_row'] >= 10 ? print ' selected': null ?>>10 ve üzeri</option>
                </select>
            </div>

            <div class="formlar">
                <p>Kan Grubu: </p>
                <select name="blood">
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 1 ? print ' selected': null ?>>0-rh</option>
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 2 ? print ' selected': null ?>>0+rh</option>
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 3 ? print ' selected': null ?>>A+rh</option>
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 4 ? print ' selected': null ?>>A-rh</option>
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 6 ? print ' selected': null ?>>B+rh</option>
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 6 ? print ' selected': null ?>>B-rh</option>
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 7 ? print ' selected': null ?>>AB+rh</option>
                    <option<?php isset($result['blood']) && !empty($result['blood']) && $result['blood'] == 8 ? print ' selected': null ?>>AB-rh</option>
                </select>
            </div>

        </div>

        <div class="egitimsel">

            <h3>EĞİTİM BİLGİLERİ</h3>

            <div class="formlar">
                <p>İLKOKUL:</p>
                <input type="text" name="primary_school" value="<?php isset($result['primary_school']) && !empty($result['primary_school']) ? print $result['primary_school']: null ?>">
                <br>
            </div>

            <div class="formlar">
                <p>ORTAOKUL:</p>
                <input type="text" name="middle_school" value="<?php isset($result['middle_school']) && !empty($result['middle_school']) ? print $result['middle_school']: null ?>">
                <br>
            </div>

            <div class="formlar">
                <p>LİSE:</p>
                <input type="text" name="high_school" value="<?php isset($result['high_school']) && !empty($result['high_school']) ? print $result['high_school']: null ?>">
                <br>
            </div>

            <div class="formlar">
                <p>ÜNİVERSİTE:</p>
                <input type="text" name="university" value="<?php isset($result['university']) && !empty($result['university']) ? print $result['university']: null ?>">
                <br>
            </div>

            <div class="formlar">
                <p>ÜNİVERSİTE DİPLOMA NOTU:</p>
                <input type="text" name="note_u" value="<?php isset($result['note_u']) && !empty($result['note_u']) ? print $result['note_u']: null ?>">
                <br>
            </div>

            <div class="formlar">
                <p>KPSS PUANI</p>
                <input type="text" name="kpss" value="<?php isset($result['kpss']) && !empty($result['kpss']) ? print $result['kpss']: null ?>">
                <br>
            </div>

        </div>

           <input style="margin-left: 290px" type="submit" value="GÜNCELLE" name="upp">
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