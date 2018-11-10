<?php
//çıkış yapıyor.
  session_start();
  session_destroy();
  header('Location: http://localhost/Personel');
  exit;
?>