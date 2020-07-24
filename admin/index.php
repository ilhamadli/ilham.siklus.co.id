<?php 
  require_once('config.php');
  if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self')</script>";
  } else {
    $user_session = $_SESSION['email'];
    $sql_users = "SELECT * FROM users WHERE email = '$user_session'";
    $run_sql = mysqli_query($conn, $sql_users);  
    $row_users = mysqli_fetch_array($run_sql);
    $id_user = $row_users['id'];
    $user_name = $row_users['username'];
    $user_role = $row_users['role'];
    $user_image = $row_users['image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>

  <link rel="shortcut icon" href="../images/logo.ico" type="image/x-icon">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
  <!-- theme css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- datatables css -->
  <link rel="stylesheet" href="./css/datatables/dataTables.bootstrap4.min.css">
  <!-- admin css -->
  <link rel="stylesheet" href="./css/admin_style.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
  <!-- ckeditor -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
</head>

<body id="page-top">
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light static-top shadow-sm" style="background-color: #fff;">
    <a class="navbar-brand" href="index.php?dashboard" style="margin-right: 3rem;margin-left: 2rem; text-transform: uppercase; color: rgb(49, 222, 121)">Admin Panel</a>
    <button class="btn btn-link btn-sm text-dark order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars fa-2x" style="color: rgb(49, 222, 121)"></i>
    </button>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" style="padding-top: 0.8rem;">
        <p class="username"><?= htmlspecialchars($user_name); ?></p>
        <small class="d-flex text-muted justify-content-end"><?= htmlspecialchars($user_role); ?></small>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle img-fluid avatar" src="<?php echo BASE_URL . '/admin/img/' . $user_image; ?>" alt="avatar">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <!-- <a class="dropdown-item" href="#">Edit Profile</a>
          <a class="dropdown-item" href="#">News Stream</a>
          <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- navbar end -->
  <!-- wrapper -->
  <div id="wrapper">
    <!-- sidebar -->
    <?php include( ROOT_PATH . '/includes/sidebar.php'); ?>
    <!-- sidebar end -->
    <!-- content -->
    <?php 
      if (isset($_GET['dashboard'])) {
        include( ROOT_PATH . '/dashboard.php');
      } elseif (isset($_GET['create-post'])) {
        include( ROOT_PATH . '/create-post.php');
      } elseif (isset($_GET['manage-posts'])) {
        include( ROOT_PATH . '/manage-posts.php');
      } elseif (isset($_GET['create-product'])) {
        include( ROOT_PATH . '/create-product.php');
      } elseif (isset($_GET['manage-products'])) {
        include( ROOT_PATH . '/manage-products.php');
      } elseif (isset($_GET['create-user'])) {
        include( ROOT_PATH . '/create-user.php');
      } elseif (isset($_GET['manage-users'])) {
        include( ROOT_PATH . '/manage-users.php');
      }
    ?>
    <!-- content end -->
  </div>
  <!-- wrapper end -->

  <!-- script js -->
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="./js/datatables/jquery.dataTables.min.js"></script>
  <script src="./js/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="./js/script.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
    // tooltip
    $(document).ready(function () {
      $("body").tooltip({
        selector: '[data-toggle=tooltip]'
      });
    });
  </script>
</body>
</html>
<?php } ?>