<?php
require 'includes/database.php';
require 'includes/article-fn.php';
require 'includes/url.php';

  session_start();

  if(!isset($_SESSION['is_Logged_In']))
  {

  header("location: login.php");
  }


      $conn = getDB();


      if(isset($_GET['id'])) {

      $article = getArticle($conn, $_GET['id']);

      if($article){

      $id = $article['id'];

      } else {

        die("Article not found");

      }

} else {

      die("ID not supplied ,article not found");
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $sql = " DELETE FROM article WHERE id = ? ";

    $stmt = mysqli_prepare($conn, $sql);

    if($stmt === false){

      echo mysqli_error($conn);

    } else {

      mysqli_stmt_bind_param($stmt, "i", $_GET['id']);

      if(mysqli_stmt_execute($stmt)) {

        // redirect("/index.php");

      } else {

        echo mysqli_stmt_error($stmt);

      }
    }
  }
  ?>


  <?php require 'includes/header.php';?>


  <h2>DELETE Article</h2>

  <form method="post">

    <p><b>Are you sure you want to delete this article?</b></p>
    <button>DELETE</button>
    <a href="article.php?id= <?= $article['id'];?>">Cancel</a>

  </form>


  <?php require 'includes/footer.php'; ?>
