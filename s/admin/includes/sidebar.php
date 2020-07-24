<?php 
    if (!isset($_SESSION['email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>

<ul class="sidebar navbar-nav">
    <!-- dashboard -->
    <li class="nav-item <?php if(isset($_GET['dashboard'])){ echo "active"; } ?>">
        <a href="index.php?dashboard" class="nav-link">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- dashboard end -->

    <!-- create post -->
    <li class="nav-item <?php if(isset($_GET['create-post'])){ echo "active"; } ?>">
        <a href="index.php?create-post" class="nav-link">
            <i class="far fa-newspaper"></i>
            <span>Post Form</span>
        </a>
    </li>
    <!-- create post end -->

    <!-- manage post -->
    <li class="nav-item <?php if(isset($_GET['manage-posts'])){ echo "active"; } ?>">
        <a href="index.php?manage-posts" class="nav-link">
            <i class="fas fa-scroll"></i>
            <span>Manage Posts</span>
        </a>
    </li>
    <!-- manage post end -->

    <!-- create product -->
    <li class="nav-item <?php if(isset($_GET['create-product'])){ echo "active"; } ?>">
        <a href="index.php?create-product" class="nav-link">
        <i class="fas fa-box-open"></i>
            <span>Product Form</span>
        </a>
    </li>
    <!-- create product end -->

    <!-- manage product -->
    <li class="nav-item <?php if(isset($_GET['manage-products'])){ echo "active"; } ?>">
        <a href="index.php?manage-products" class="nav-link">
        <i class="fas fa-scroll"></i>
            <span>Manage Products</span>
        </a>
    </li>
    <!-- manage product end -->

    <?php if ($user_role == "Admin"): ?>
        <!-- create user -->
        <li class="nav-item <?php if(isset($_GET['create-user'])){ echo "active"; } ?>">
            <a href="index.php?create-user" class="nav-link">
                <i class="fas fa-user-cog"></i>
                <span>User Form</span>
            </a>
        </li>
        <!-- create user end -->
    
    
        <!-- manage users -->
        <li class="nav-item <?php if(isset($_GET['manage-users'])){ echo "active"; } ?>">
            <a href="index.php?manage-users" class="nav-link">
                <i class="fas fa-users-cog"></i>
                <span>Manage Users</span>
            </a>
        </li>
        <!-- manage users end -->
    <?php endif ?>
</ul>

<?php } ?>