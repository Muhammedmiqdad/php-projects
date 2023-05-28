<?php 
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    // $sql="insert into `registration` (username,password) values('$username','$password')";
    // $result=mysqli_query($con,$sql);

    // if($result){
    //     echo "Data inserted successfully";
    // }else {
    //     die(mysqli_error($con));
    // }


    $sql="select * from `registration` where username='$username'";
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo "user already exist";
            $user=1;
        }else{
            $sql="insert into `registration` (username,password) values('$username','$password')";
             $result=mysqli_query($con,$sql);
             if($result){
                    //  echo "Signup successfully";
                    $success=1;
                    header("Location:login.php");
                 }else {
                    
                     die(mysqli_error($con));
                 }
        }
    }
}



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php
if($user) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oh No Sorry!!!</strong> User already exists!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<?php
if($success) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> You are successfully signedup
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

    <h1 class="text-center mt-4">Signup Page</h1>
    <div class="container w-50 mt-5">
        <form action="sign.php" method="post" >
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="username" >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password" >
            </div>
            <button type="submit" class="btn btn-primary w-100">Signup</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>