<?php 
  if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self')</script>";
  } else {
    include(ROOT_PATH . '/includes/admin_functions.php');

    // get all admin users form DB
    $admins = getAdminUsers();
    $roles = ['Admin', 'Author'];
?>

<div id="content-wrapper">
  <div class="container-fluid">
    <!-- breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php?dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">User Form</li>
    </ol>
    <!-- breadcrumbs end -->
    <!-- card -->
    <div class="card mb-3 border-0 shadow-sm">
      <div class="card-header">
        <?php if ($isEditingUser === true): ?>
          <i class="fas fa-user-edit"></i>
          Edit User
        <?php else: ?>
          <i class="fas fa-user-plus"></i>
          Create User
        <?php endif ?>
      </div>
      <div class="container">
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <!-- validation errors for the form -->
            <?php include(ROOT_PATH . '/includes/errors.php') ?>
            <!-- if editing user, the id is required to identify that user -->
            <?php if ($isEditingUser === true): ?>
              <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
            <?php endif ?>
            <!-- username -->
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <!-- username end -->
            <!-- email -->
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email ?>" required>
            </div>
            <!-- email end -->
            <!-- password -->
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <!-- password end -->
            <!-- password confirmation -->
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password Confirmatrion" name="passwordConfirmation" required>
            </div>
            <!-- password confirmation end -->
            <!-- profile image -->
            <div class="form-group">
              <input name="profile_img" type="file" class="form-control" required>
            </div>
            <!-- profile image end -->
            <!-- role -->
            <div class="form-group">
              <select name="role" class="form-control" required>
                <option value="" selected disabled>Assign role</option>
                <?php foreach ($roles as $key => $role): ?>
                  <option value="<?php echo $role ?>"><?php echo $role ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <!-- role end -->
            <!-- if editing user, display the update button instead of create button -->
            <?php if ($isEditingUser === true): ?>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary" name="update_admin">UPDATE</button>
              </div>
            <?php else: ?>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary" name="create_admin">SUBMIT</button>
              </div>
            <?php endif ?>
          </form>
        </div>
      </div>
    </div>
    <!-- card end -->
  </div>
</div>
<?php } ?>