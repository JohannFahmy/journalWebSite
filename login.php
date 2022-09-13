<?php


  require('includes/database.php');

  session_start();

  if( isset($_SESSION['is_Logged_In']))
  {

    header("location: index-admin.php");
  }


  if($_SERVER["REQUEST_METHOD"] == "POST"){

      //passing in true as the argument deletes the old session.
      session_regenerate_id(true);

      $conn = getDB();

      $un = $_POST['username'];
      $password = $_POST['password'];

      $hashedPassword = MD5($password);
      $query = "SELECT name,password
        FROM admins
        WHERE name='$un'
        AND password='$hashedPassword'";

      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) >  0) {

        $_SESSION['is_Logged_In'] = true;
        header("Location: index-admin.php");

      } else {

        die("invalid credentials");
      }
}






if (isset($_POST['register'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        $query = mysqli_query($db, "INSERT INTO users (name, password)
        VALUES ('$name', MD5('".$password."'))");

        //$query="INSERT INTO ptb_users (id,user_id,first_name,last_name,email )VALUES('NULL','NULL','".$firstname."','".$lastname."','".$email."',MD5('".$password."'))";
        echo 'OK.';
    } else {
        echo 'Error.';
    }
}



 ?>
 <?php require 'includes/header.php';?>

 <h2>Login</h2>

<form method="post">

   <div>
     <label for="username">Username</label>
     <input name="username" id="username">
  </div>

  <div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </div>

  <button>Login</button>

</form>

<?php require 'includes/footer.php'; ?>
