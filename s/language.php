<?php 
  // session_start();

  if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    // register the session and set the cookie
    $_SESSION['lang'] = $lang;
    setcookie("lang", $lang, time() + (3600 * 24 * 30));
  } else if(isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
  } else if(isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
  } else {
    $lang = 'en';
  }

  switch ($lang) {
    case 'en':
      // english
      $lang_file = 'lang.en.php';
    break;

    case 'id':
      // indonesia
      $lang_file = 'lang.id.php';
    break;
  }

  include_once 'language/'.$lang_file;
?>