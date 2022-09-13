<?php

  require 'includes/database.php';
  require 'includes/article-fn.php';



    if($_SERVER["REQUEST_METHOD"] == "POST"){

      $conn = getDB();

    $sql = "INSERT INTO article (title, content, published_at)
            VALUES ('". $_POST['title']. "','"
              . $_POST['content']. "','"
              . $_POST['published_at'].  "')";




  $result = mysqli_query($conn, $sql);

  if($result === false){

    echo mysqli_error($conn);

  } else {

          $id = mysqli_insert_id($conn);
          echo "INSERTED record with ID: $id";
          header("location: index.php?id= $id");
          exit;
  }
}

 ?>

<?php require 'includes/header.php';?>


<h2>New Article</h2>

<?php require 'includes/article-form.php';?>

<a href="index.php">Return to articles</a>

<?php require 'includes/footer.php'; ?>
