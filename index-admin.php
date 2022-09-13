<?php

require 'includes/database.php';

session_start();

  if(!isset($_SESSION['is_Logged_In']))
    {
      header("location:login.php");
    }

  $conn = getDB();


  if ($_SERVER['REQUEST_METHOD']=='POST') {

      $username = $_POST['name'];
      $password = $_POST['password'];

      $sql= "SELECT * FROM admins WHERE name = '$username' AND password = '$password' ";

      $result = mysqli_query($con,$sql);

      $check = mysqli_fetch_array($result);

      if(isset($check)){

        echo 'success';

      }else{

        echo 'failure';

      }
    }



  $sql = "SELECT * FROM article ORDER BY id";

  $result = mysqli_query($conn, $sql);

  if($result === false){

    echo mysqli_error($conn);

  } else {

    $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);


  }


 ?>

<?php require 'includes/header.php';?>

<a href="logout.php">Logout</a>


      <?php if(empty($articles)): ?>
        <p>No article found</p>

  <h2> <a href="edit-article.php?id=<?= $article['id']; ?>"><?= $article['title'];?></a></h2>
      <?php else:?>
    <ul>
      <?php foreach ($articles as $article): ?>


        <li>
            <article>

              <h2> <a href="article-admin.php?id=<?= $article['id']; ?>"><?= $article['title'];?></a></h2>


            </article>

          <?php endforeach; ?>

        </li>

    </ul>



      <?php endif; ?>
  <?php require 'includes/footer.php'; ?>
