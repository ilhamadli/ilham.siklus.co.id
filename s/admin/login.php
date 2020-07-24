<?php 
    // session_start();
    include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login Page</title>
        <link rel="shortcut icon" href="../images/logo.ico" type="image/x-icon">
        <!-- theme css -->
        <link rel="stylesheet" href="../css/style.css">
        <!-- admin css -->
        <link rel="stylesheet" href="css/login.css">
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    </head>
    <body>
        <form method="post" class="form-signin shadow rounded">
            <div class="text-center mb-4">
                <img class="mb-4 logo-login" src="<?php echo BASE_URL . '/images/logo1.png' ?>" alt="logo">
            </div>
            <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
                <label for="inputEmail">Email address</label>
            </div>
            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pwd" required>
                <label for="inputPassword">Password</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
        </form>

        <!-- script js -->
        <script src="../js/jquery-migrate-3.0.1.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $password = md5($pwd);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $run_sql = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run_sql);
        if ($count == 1) {
            $_SESSION['email'] = $email;
            echo "<script>window.open('index.php?dashboard','_self')</script>";
        } else {
            echo "<script>alert('Email or Password is wrong !')</script>";
        }
    }
?>