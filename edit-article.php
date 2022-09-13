<?php


session_start();
require 'includes/database.php';
require 'includes/article-fn.php';



  if(!isset($_SESSION['is_Logged_In']))
  {
    header("location:login.php");
  }

  $conn = getDB();





  if ($_SERVER['REQUEST_METHOD']=='POST') {

      $username = $_POST['name'];
      $password = $_POST['password'];

      $sql= "UPDATE * SET admins WHERE name = '$username' AND password = '$password' ";

      $result = mysqli_query($con,$sql);

      $check = mysqli_fetch_array($result);

      if(isset($check)){

        echo 'success';

      }else{

        echo 'failure';

      }
    }


      if(isset($_GET['id'])) {

      $article = getArticle($conn, $_GET['id']);

      if($article){



        $title = $article['title'];
        $content = $article['content'];
        $published_at = $article['published_at'];

      } else {

        die("not found");

      }

} else {

      die("id not supplied ,article not found");
  }



  if($_SERVER['REQUEST_METHOD'] == "POST"){

      $title = $article['title'];
      $content = $article['content'];
      $published_at = $article['published_at'];

      $errors = validateArticle($title, $content, $published_at);

      if (empty($errors)){

  $sql = "UPDATE article
           SET title = ?,
               content = ?,
               published_at = ?
            WHERE id = ?";



    $stmt = mysqli_prepare($conn, $sql);

    if($stmt === false){

      echo mysqli_error($conn);

    } else {

      if($published_at == ''){

        $published_at = null;

      }


      mysqli_stmt_bind_param($stmt, "sssi", $_POST['title'], $_POST['content'],$_POST['published_at'], $_GET['id']);

      if(mysqli_stmt_execute($stmt)) {

           //Closing the statement
           mysqli_stmt_close($stmt);
           //Closing the connection
           mysqli_close($conn);

         redirect("index-admin.php?");

      } else {

        echo mysqli_stmt_error($stmt);

      }
    }
  }
}


  ?>

  <?php require 'includes/header.php';?>


  <h2>Edit Article</h2>



  <?php require 'includes/article-form.php';?>
  <?php require 'includes/footer.php'; ?>
