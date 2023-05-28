<?php 
// include 'connect.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
    <h1 class="text-center text-warning mt-5" >welcome <?php echo $_SESSION['username'];?></h1>

    <div class="container">
        <a href="logout.php" class="btn btn-primary mt-5 " >Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>


