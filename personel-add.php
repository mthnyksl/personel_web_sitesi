<?php
  session_start();
  if(!isset($_SESSION['login']) && !$_SESSION['login']){
    header('Location: http://localhost/Personel');
    exit;
  }
  if(isset($_POST['add']) && $_POST['add']){
    require 'baglan.php';
    $sql = "INSERT INTO personel(tc, namelast, fathername, mothername, birthday, birthplace, homeaddress,cellphone,
    email,bro_row, blood, primary_school, middle_school, high_school, university, note_u, kpss)
    VALUES(:tc, :namelast, :fathername, :mothername, :birthday, :birthplace, :homeaddress, :cellphone, :email,
    :bro_row, :blood, :primary_school, :middle_school, :high_school, :university, :note_u, :kpss)";
    
    $sth = $db->prepare($sql);
    $add = $sth->execute([
      "tc" => isset($_POST["tc"]) && !empty($_POST["tc"]) ? $_POST["tc"]: null,
      "namelast" =>isset($_POST["namelast"]) && !empty($_POST["namelast"]) ? $_POST["namelast"]: null,
      "fathername" => isset($_POST["fathername"]) && !empty($_POST["fathername"]) ? $_POST["fathername"]: null,
      "mothername" => isset($_POST["mothername"]) && !empty($_POST["mothername"]) ? $_POST["mothername"]: null,
      "birthday" => isset($_POST["birthday"]) && !empty($_POST["birthday"]) ? $_POST["birthday"]: null,
      "birthplace" => isset($_POST["birthplace"]) && !empty($_POST["birthplace"]) ? $_POST["birthplace"]: null,
      "homeaddress" => isset($_POST["homeaddress"]) && !empty($_POST["homeaddress"]) ? $_POST["homeaddress"]: null,
      "cellphone" => isset($_POST["cellphone"]) && !empty($_POST["cellphone"]) ? $_POST["cellphone"]: null,
      "email" => isset($_POST["email"]) && !empty($_POST["email"]) ? $_POST["email"]: null,
      "bro_row" => isset($_POST["bro_row"]) && !empty($_POST["bro_row"]) ? $_POST["bro_row"]: null,
      "blood" => isset($_POST["blood"]) && !empty($_POST["blood"]) ? $_POST["blood"]: null,
      "primary_school" => isset($_POST["primary_school"]) && !empty($_POST["primary_school"]) ? $_POST["primary_school"]: null,
      "middle_school" => isset($_POST["middle_school"]) && !empty($_POST["middle_school"]) ? $_POST["middle_school"]: null,
      "high_school" => isset($_POST["high_school"]) && !empty($_POST["high_school"]) ? $_POST["high_school"]: null,
      "university" => isset($_POST["university"]) && !empty($_POST["university"]) ? $_POST["university"]: null,
      "note_u" => isset($_POST["note_u"]) && !empty($_POST["note_u"]) ? $_POST["note_u"]: null,
      "kpss" => isset($_POST["kpss"]) && !empty($_POST["kpss"]) ? $_POST["kpss"]: null,
    ]);
    if($add)
      echo '<script>alert("Personel Eklendi.")</script>';
    else
      echo '<script>alert("Personel Eklenirken bir sorun oluştu.")</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Persenol Ekleme</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merienda" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <link rel="stylesheet" href="personel-add.css">
    <link rel="stylesheet" href="style.css">
    <style>
        #header input[type="submit"]{
            background-color: #29292B;
            color: #fed136 ;
            width: 100px;
            cursor: pointer;
        }
        .error{
            font-weight: bold;
            color: darkred;
            padding-left: 210px;
        }
    </style>
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

        <form action="" method="post">
            <div class="kisisel">

                <h3>KİŞİSEL BİLGİLERİ</h3>
                <div class="formlar">
                    <p>Tc Kimlik No:</p>
                    <input id="tcNumber" type="text" name="tc" maxlength="11" minlength="11">
                    <span id="errorTcNumber" class="error"></span>

                    <br>
                </div>

                <div class="formlar">
                    <p>Ad Soyad: </p>
                    <input id="AdSoyad" type="text" name="namelast" class="bosluk">
                    <span id="errorAdSoyad" class="error"></span>

                </div>

                <div class="formlar">
                    <p>Baba Adı: </p>
                    <input id="BabaAdi" type="text" name="fathername" class="bosluk">
                    <span id="errorBabaAdi" class="error"></span>

                </div>

                <div class="formlar">
                    <p>Anne Adı: </p>
                    <input id="AnneAdi" type="text" name="mothername">
                    <span id="errorAnneAdi" class="error"></span>
                </div>

                <div class="formlar">
                    <p>Doğum Tarihi: </p>
                    <input type="date" name="birthday">
                </div>

                <div class="formlar">
                    <p>Dogum Yeri: </p>
                    <input id="DogumYeri" type="text" name="birthplace">
                    <span id="errorDogumYeri" class="error"></span>
                </div>

                <div class="formlar">
                    <p>Ev Adresi: </p>
                    <input id="EvAdresi" type="text" name="homeaddress">
                    <span id="errorEvAdresi" class="error"></span>
                </div>

                <div class="formlar">
                    <p>Cep Telefonu: </p>
                    <input id="CepTel" type="text" name="cellphone" maxlength="10" minlength="10">
                    <span id="errorCepTel" class="error"></span>
                </div>

                <div class="formlar">
                    <p>E-mail Adresi: </p>
                    <input id="Email" type="email" name="email">
                    <span id="errorEmail" class="error"></span>
                </div>

                <div class="formlar">
                    <p>Kardeş Sayısı: </p>
                    <select name="bro_row">
                        <option>Yok</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10 ve üzeri</option>
                    </select>
                </div>

                <div class="formlar">
                    <p>Kan Grubu: </p>
                    <select name="blood">
                        <option>0-rh</option>
                        <option>0+rh</option>
                        <option>A+rh</option>
                        <option>A-rh</option>
                        <option>B+rh</option>
                        <option>B-rh</option>
                        <option>AB+rh</option>
                        <option>AB-rh</option>
                    </select>
                </div>

            </div>

            <div class="egitimsel">

            <h3>EĞİTİM BİLGİLERİ</h3>

                <div class="formlar">
                    <p>İLKOKUL:</p>
                    <input id="ilkokul" type="text" name="primary_school">
                    <span id="errorilkokul" class="error"></span>
                    <br>
                </div>

                <div class="formlar">
                    <p>ORTAOKUL:</p>
                    <input id="Ortaokul" type="text" name="middle_school">
                    <span id="errorOrtaokul" class="error"></span>
                    <br>
                </div>

                <div class="formlar">
                    <p>LİSE:</p>
                    <input id="Lise" type="text" name="high_school">
                    <span id="errorLise" class="error"></span>
                    <br>
                </div>

                <div class="formlar">
                    <p>ÜNİVERSİTE:</p>
                    <input id="uni" type="text" name="university">
                    <span id="erroruni" class="error"></span>
                    <br>
                </div>

                <div class="formlar">
                    <p>ÜNİVERSİTE DİPLOMA NOTU:</p>
                    <input id="DipNot" type="text" name="note_u">
                    <span id="errorDipNot" class="error"></span>
                    <br>
                </div>

                <div class="formlar">
                    <p>KPSS PUANI</p>
                    <input id="Kpss" type="text" name="kpss">
                    <span id="errorKpss" class="error"></span>
                    <br>
                </div>

            </div>
            <input id="btnGonder" style="margin-left: 290px" type="submit" value="KAYDET" name="add">

          </form>

    </div>
</div>

<div id="footer">
    <div id="footer inner" class="container">
        <span>Copyright © Your Website 2018</span>
    </div>
</div>
</body>
<script>

    function isEmail(email) {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        return pattern.test(email);
    }

    $(document).ready(function () {
        $("#btnGonder").click(function () {

            var j = 0;
            var veriables = [$("#tcNumber").val(),$("#AdSoyad").val(),$("#BabaAdi").val(),$("#AnneAdi").val(),$("#DogumYeri").val(),$("#EvAdresi").val(),$("#CepTel").val(),$("#Email").val(),$("#ilkokul").val(),$("#Ortaokul").val(),$("#Lise").val(),$("#uni").val(),$("#DipNot").val(),$("#Kpss").val()];
            var warnings =  [$("#errorTcNumber"),$("#errorAdSoyad"),$("#errorBabaAdi"),$("#errorAnneAdi"),$("#errorDogumYeri"),$("#errorEvAdresi"),$("#errorCepTel"),$("#errorEmail"),$("#errorilkokul"),$("#errorOrtaokul"),$("#errorLise"),$("#erroruni"),$("#errorDipNot"),$("#errorKpss")];

            for (var i=0;i<warnings.length;i++){
                warnings[i].text("");
            }

            for(var i=0;i<veriables.length;i++){
                if(veriables[i] == ""){
                    warnings[i].text("BU ALAN BOŞ GEÇİLEMEZ!!");
                    j = 1;
                }
                else if(i==0){
                    if($.isNumeric(veriables[i])==false){
                        warnings[i].text("LÜTFEN SADECE RAKAM GİRİNİZ!");
                        j = 1;
                    }
                    else if(veriables[0].length != 11){
                        warnings[0].text("TC KİMLİK NUMARANIZI EKSİK GİRDİNİZ!");
                        j = 1;
                    }

                }
                else if(i==6){
                    if($.isNumeric(veriables[i])==false){
                        warnings[i].text("LÜTFEN SADECE RAKAM GİRİNİZ!");
                        j = 1;
                    }
                    else if(veriables[6].length != 10){
                        warnings[6].text("TELEFON NUMARANIZI EKSİK GİRDİNİZ!");
                        j = 1;
                    }

                }
                else if(i==7){
                    if(isEmail(veriables[7]) == false){
                        warnings[7].text("GEÇERSİZ E-MAİL ADRESİ");
                        j = 1;
                    }
                }

            }
            if(j == 1)
                return false;
            else
                $("#btnGonder").submit();
        });
    });
</script>
</html>