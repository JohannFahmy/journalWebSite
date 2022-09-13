<?php

//redirect to another URL on the same site

//string path the path to redirect to
  function redirect($path){

  if(isset($_SERVER ['HTTPS']) && $_SERVER['HTTPS'] !='off'){
    $protocol = 'https';

  } else {

    $protocol = 'http';

  }
  header ("location : $protocol://" . $_SERVER['HTTP_HOST'] .  $path);
  exit;

}















 ?>
