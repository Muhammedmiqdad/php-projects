<?php 
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from `registration` where username='$username' and password='$password'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "Login successful";
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
            
        }else{
            // echo "Invalid data";
            $invalid=1;
        }
           
    }
}



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
if($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> you are successfully logged in
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<?php
if($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error</strong> Invalid credentials
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

    <h1 class="text-center mt-4">Login Page</h1>
    <div class="container w-50 mt-5">
        <form action="login.php" method="post" >
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="username" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" >
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>