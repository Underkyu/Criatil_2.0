<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

  $BASE_URL =  "https://" . $_SERVER['SERVER_NAME'] . "/filegator/repository/GrupoCriatil/Criatil_2.0/Criatil_2.0/";

?>