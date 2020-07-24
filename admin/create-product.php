<?php 
  if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self')</script>";
  } else {
    include(ROOT_PATH . '/includes/product_functions.php');
    include(ROOT_PATH . '/includes/admin_functions.php');
?>

<div id="content-wrapper">
  <div class="container-fluid">
    <!-- breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php?dashboard">Dashboard</a>
      </li>
      <?php if (isset($_GET['edit-product'])): ?>
        <li class="breadcrumb-item active">Edit Product</li>
      <?php else: ?>
        <li class="breadcrumb-item active">Create Product</li>
      <?php endif ?>
    </ol>
    <!-- breadcrumbs end -->
    <!-- form -->
    <div class="card mb-3 border-0 shadow-sm">
      <div class="card-header">
        <i class="fas fa-calendar-plus"></i> Create Product
      </div>
      <div class="container">
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <!-- validation errors for the form -->
            <?php include(ROOT_PATH . '/includes/errors.php') ?>
            <!-- if editing post, the id is required to identify that post -->
            <?php if (isset($_GET['edit-product'])): ?>
              <input type="hidden" name="product_id" value="<?= $product_id ?>">
            <?php endif ?>
            <!-- product title -->
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Title" name="title" value="<?= $title ?>" required>
            </div>
            <!-- product title end -->
            <!-- product image -->
            <div class="form-group">
              <input type="file" name="product_img" class="form-control" required>
            </div>
            <!-- product image end -->
            <!-- article -->
            <div class="form-group">
              <label for="">Text in English</label>
              <textarea name="body" cols="50" rows="10" class="ckeditor" required><?= $body ?></textarea>
              <p class="pesan" style="color: red;"></p>
            </div>
            <!-- article end -->
            <!-- article -->
            <div class="form-group">
              <label for="">Text in Bahasa</label>
              <textarea name="body_id" cols="50" rows="10" class="ckeditor" required><?= $body_id ?></textarea>
              <p class="pesan" style="color: red;"></p>
            </div>
            <!-- article end -->
            <!-- if editing post, display the update button instead of create button -->
            <?php if (isset($_GET['edit-product'])): ?>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary" name="update_product">UPDATE</button>
              </div>
            <?php else: ?>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary" name="create_product">SUBMIT</button>
              </div>
            <?php endif ?>
          </form>
        </div>
      </div>
    </div>
    <!-- form end -->
  </div>
</div>
<?php } ?>