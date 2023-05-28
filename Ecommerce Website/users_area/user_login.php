<?php 
     include('../includes/connect.php');
      include('../functions/common_function.php');
      @session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-item-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="user_username" class="form-lable">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control"
                            placeholder="Enter your user name" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password field -->
                        <label for="user_password" class="form-lable">password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control"
                            placeholder="Enter your user password" autocomplete="off" required="required">
                    </div>
                    <div class="mt-4 pt-2 mb-0">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="user_registration.php"
                                class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>



<?php
// include('../includes/connect.php');
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    // cart item
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username']=$user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Login successful')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }

    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>



    