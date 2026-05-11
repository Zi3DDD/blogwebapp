<?php 

  require('lib-user.php');


  if(isset($_POST["btn_login"])){  
  $email = $_USR->filter_input($_POST["email"]);
  $password = $_USR->filter_input($_POST["password"]);
  $_USR->login($email,$password) ? "OK" : $_USR->error;
  }

  



