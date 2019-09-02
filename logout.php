<?php
  $tmp=$_SESSION['epin'];
  session_destroy();
  session_regenerate_id();
  $_SESSION['epin']=$tmp;
  header('Location:login.php');
  ?>
  
  
  
  
  
  
  <?php
  $tmp=$_SESSION['usename'];
  session_destroy();
  session_regenerate_id();
  $_SESSION['username']=$tmp;
  header('Location:admin_login_form.php');
  ?>