<?php

// Get the article record based on the  ID
//
// $conn connects to the db
//
// $id the article id
//
// assoc array containg the article id or null not found
//
//
//

function getArticle($conn, $id, $columns = '*'){

  $sql = "SELECT $columns
  FROM article
  WHERE id = ? ";

  $stmt = mysqli_prepare($conn, $sql);

  if($stmt === false){

    echo mysqli_error($conn);

  } else {
    //passing the id and binding it with an integer

    mysqli_stmt_bind_param($stmt,"i", $id);

    if(mysqli_stmt_execute($stmt)){

      $result = mysqli_stmt_get_result($stmt);

      return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
  }
}


function validateArticle($title, $content, $published_at){

  $errors = [];

    if ($title == ''){
      $errors[] = "Title is required";

  }

  if ($content == ''){
    $errors[] = "Content is required";
  }

  if ($published_at != ''){

    $date_time = date_create_from_format('Y-m-d H:i:s',$published_at);

    if($date_time == false){
        $errors[] = "Invalid date and time";

    }


    }
  
  return $errors;
}


 ?>
