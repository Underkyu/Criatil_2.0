<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

  $BASE_URL = "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]."?") . "/";

?>