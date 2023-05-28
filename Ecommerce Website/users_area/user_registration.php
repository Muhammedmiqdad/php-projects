<?php include('../includes/connect.php');
      include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <!-- username field -->
                        <label for="user_username" class="form-lable">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your user name" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- email field -->
                        <label for="user_email" class="form-lable">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your user email" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- image field -->
                        <label for="user_image" class="form-lable">file</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- password field -->
                        <label for="user_password" class="form-lable">password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your user password" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- conform password field -->
                        <label for="conf_user_password" class="form-lable">conform password</label>
                        <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Conform  password" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- address field -->
                        <label for="user_address" class="form-lable">address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <!-- contact field -->
                        <label for="user_contact" class="form-lable">contact</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required="required">
                    </div>
                    <div class="mt-4 pt-2 mb-0">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_login.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->

<?php
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress(); 

    //select query

    $select_query="select * from `user_table` where user_name='$user_username' or user_email='$user_email' ";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already existed')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('Password do not match')</script>";
    }
    else{
            //insert_query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
    }
  

    //selecting cart items
    $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have item in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }else{
        echo "<script>window.open('../index.php','_self')</script>";
    }

}









?>