<?php

  $db_name = 'GrupoCriatil';
  $db_host = 'projectt.ddns.net';
  $db_port = '3789';  
  $db_user = 'GrupoCriatil';
  $db_pass = 'GrupoCriatil';

  $conn = new PDO("mysql:dbname=$db_name;host=$db_host;port=$db_port", $db_user, $db_pass);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>