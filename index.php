<?php

require 'includes/database.php';

  session_start();
  $conn = getDB();

  


  $sql = "SELECT * FROM article ORDER BY id";

  $result = mysqli_query($conn, $sql);

  if($result === false){

    echo mysqli_error($conn);

  } else {

    $article = mysqli_fetch_all($result, MYSQLI_ASSOC);


  }


 ?>

<?php require 'includes/header.php';?>





  <a href="new-article.php">New Article</a>

      <?php if(empty($article)): ?>
        <p>No article found</p>


      <?php else:?>
    <ul>
      <?php foreach ($article as $article): ?>


        <li>
            <article>

              <h2> <a href="article.php?id=<?= $article['id']; ?>"><?= $article['title'];?></a></h2>


            </article>

          <?php endforeach; ?>

        </li>

    </ul>



      <?php endif; ?>
  <?php require 'includes/footer.php'; ?>
