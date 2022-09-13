<?php

//return the user auth status

//bool true logged in, otherwise false

function isLoggedIn(){

  if( $un && password_verify($pw, $un['password'])){

       $_SESSION['is_Logged_In'] = true;


       
  }
}

 ?>
