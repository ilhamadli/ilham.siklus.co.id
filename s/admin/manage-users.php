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
            <li class="breadcrumb-item active">Manage Users</li>
            </ol>
        <!-- breadcrumbs end -->

        <!-- card -->
        <div class="card mb-3 border-0">
            <div class="card-header">
                <i class="fas fa-tasks"></i>&nbsp;Manage Users
            </div>
            <div class="card-body">
                <?php if (empty($admins)): ?>
                    <h1>No data in the database.</h1>
                <?php else: ?>
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width:5%">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th style="width:15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admins as $key => $admin): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $admin['username']; ?></td>
                                <td><?php echo $admin['email']; ?></td>
                                <td><?php echo $admin['role']; ?></td>
                                <td>
                                    <a href="index.php?create-user&edit-user=<?php echo $admin['id']; ?>" data-toggle="tooltip" title="Edit"><i class="fas fa-edit mr-2"></i></a>
                                    <span> </span>
                                    <a href="index.php?manage-users&delete-user=<?php echo $admin['id']; ?>" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                    <span> </span>
                                </td>                       
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>
        <!-- card end -->
    </div>
</div>



<?php } ?>