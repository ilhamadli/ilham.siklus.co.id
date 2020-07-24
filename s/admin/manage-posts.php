<?php 
    if (!isset($_SESSION['email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
        include(ROOT_PATH . '/includes/post_functions.php');
        include(ROOT_PATH . '/includes/admin_functions.php');

        // Get all admin posts from DB 
        $posts = getAllPosts();
?>

<div id="content-wrapper">
    <div class="container-fluid">
        <!-- breadcrumbs -->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php?dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Posts</li>
            </ol>
        <!-- breadcrumbs end -->

        <!-- card -->
        <div class="card mb-3 border-0">
            <div class="card-header">
                <i class="fas fa-tasks"></i>&nbsp;Manage Post
            </div>
            <div class="card-body">
                <!-- Display notification message -->
                <?php include(ROOT_PATH . '/includes/messages.php'); ?>

                <?php if (empty($posts)): ?>
                    <h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
                <?php else: ?>
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:5%">No</th>
                                <th style="width:40%">Title</th>
                                <th>Author</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $key => $post): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $post['title']; ?></td>
                                <td><?php echo $post['author']; ?></td>
                                <td>
                                    <a href="index.php?create-post&edit-post=<?php echo $post['id']; ?>" data-toggle="tooltip" title="Edit"><i class="fas fa-edit mr-2"></i></a>
                                    <span> </span>
                                    <a href="index.php?manage-posts&delete-post=<?php echo $post['id']; ?>" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    <span> </span>
                                </td>                       
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
        <!-- card end -->
    </div>
</div>



<?php } ?>