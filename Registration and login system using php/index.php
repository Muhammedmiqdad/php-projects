<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center">
        <div class="card">
            <!-- card hearder -->
            <div class="card-header">
                <h3 class="text-center">Sign Up</h3>
            </div>
            <!-- card body -->
            <div class="card-body">
            <form action="">
                <!-- first field -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="Enter your username" required="required" autocomplete="off" name="username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <!-- second field -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                    <input type="password" class="form-control" placeholder="Enter your password" required="required" autocomplete="off" name="password" aria-label="password" aria-describedby="basic-addon1">
                </div>
                <!-- third field -->
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="Confirm_password" required="required" autocomplete="off" name="Confirm_password" aria-label="Confirm_password" aria-describedby="basic-addon1">
                </div>
                <!-- signup button -->
                <div class="form-group">
                    <input type="submit" name="register" value="Sign Up" class=" btn registration_btn">
                </div>
            </form>
            </div>
            <!-- card footer -->
            <div class="card-footer text-center text-light signup">
                Already have an account?<a href="signin.php">Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>