<?php 
  if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self')</script>";
  } else {
    include(ROOT_PATH . '/includes/post_functions.php');
    include(ROOT_PATH . '/includes/admin_functions.php');
    
    // get all topics
    // $topics = getAllTopics();
?>

<div id="content-wrapper">
  <div class="container-fluid">
    <!-- breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php?dashboard">Dashboard</a>
      </li>
      <?php if (isset($_GET['edit-post'])): ?>
        <li class="breadcrumb-item active">Edit Post</li>
      <?php else: ?>
        <li class="breadcrumb-item active">Create Post</li>
      <?php endif ?>
    </ol>
      <!-- breadcrumbs end -->
      <!-- form -->
    <div class="card mb-3 border-0 shadow-sm">
      <div class="card-header">
        <i class="fas fa-calendar-plus"></i> Create Post
      </div>
      <div class="container">
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <!-- validation errors for the form -->
            <?php include(ROOT_PATH . '/includes/errors.php') ?>
            <!-- if editing post, the id is required to identify that post -->
            <?php if (isset($_GET['edit-post'])): ?>
              <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <?php endif ?>
            <!-- post title -->
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Title" name="title" value="<?php echo $title; ?>" required>
            </div>
            <!-- post title end -->
            <!-- featured image -->
            <div class="form-group">
              <input name="featured_img" type="file" class="form-control" required>
            </div>
            <!-- featured image end -->
            <!-- article -->
            <div class="form-group">
              <label for="en">Text in English</label>
              <textarea name="body" class="ckeditor" cols="50" rows="10" required><?php echo $body; ?></textarea>
              <p class="pesan" style="color: red;"></p>
            </div>
            <!-- article end -->
            <!-- article -->
            <div class="form-group">
              <label for="id">Text in Bahasa</label>
              <textarea name="body_id" class="ckeditor" cols="50" rows="10" required><?php echo $body_id; ?></textarea>
              <p class="pesan" style="color: red;"></p>
            </div>
            <!-- article end -->
            <!-- text highlight -->
            <div class="form-group">
              <label>Text Highlight</label>
              <textarea name="highlight" class="form-control" rows="2" required><?php echo $highlight; ?></textarea>
            </div>
            <!-- text highlight end -->
            <!-- if editing post, display the update button instead of create button -->
            <?php if (isset($_GET['edit-post'])): ?>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary" name="update_post">UPDATE</button>
              </div>
            <?php else: ?>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-lg btn-primary" name="create_post">SUBMIT</button>
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