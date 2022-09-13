<?php



  function getDB()
  {
    $servername = "localhost";
    $username = "cms_www_";
    $password = "Gw0x(]8U(hnYbl1X";
    $db = "cms1";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";

    return $conn;
  }
