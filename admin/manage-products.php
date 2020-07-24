<?php 
  if (!isset($_SESSION['email'])) {
    echo "<script>window.open('login.php','_self')</script>";
  } else {
    include(ROOT_PATH . '/includes/product_functions.php');
    include(ROOT_PATH . '/includes/admin_functions.php');
    // Get all admin products from DB 
    $products = getAllProducts();
?>

<div id="content-wrapper">
  <div class="container-fluid">
    <!-- breadcrumbs -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php?dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item active">Manage products</li>
    </ol>
    <!-- breadcrumbs end -->
    <!-- card -->
    <div class="card mb-3 border-0">
      <div class="card-header">
        <i class="fas fa-tasks"></i>&nbsp;Manage products
      </div>
      <div class="card-body">
        <!-- Display notification message -->
        <?php include(ROOT_PATH . '/includes/messages.php'); ?>
        <?php if (empty($products)): ?>
          <h1 style="text-align: center; margin-top: 20px;">No products in the database.</h1>
        <?php else: ?>
          <table id="example" class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th style="width:5%">No</th>
                <th style="width:72%">Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>             
              <!-- looping -->
              <?php foreach ($products as $key => $product): ?>
                <tr>
                  <td><?php echo $key + 1; ?></td>
                  <td><?php echo $product['title']; ?></td>
                    <td>
                      <a href="index.php?create-product&edit-product=<?php echo $product['id']; ?>" data-toggle="tooltip" title="Edit"><i class="fas fa-edit mr-2"></i></a>
                      <span> </span>
                      <a href="index.php?manage-products&delete-product=<?php echo $product['id']; ?>" data-toggle="tooltip" title="Delete"><i class="fas fa-trash-alt"></i></a>
                      <span> </span>
                    </td>                       
                </tr>
              <?php endforeach; ?>
              <!-- looping end -->
            </tbody>
          </table>
        <?php endif ?>
      </div>
    </div>
    <!-- card end -->
  </div>
</div>
<?php } ?>