<?php 
  // product variables
  $product_id = 0;
  $isEditingProduct = false;
  $title = "";
  $product_img = "";
  $body = "";
  $body_id = "";


// get all products from DB
function getAllProducts() {
  global $conn;

  $sqlQuery = "SELECT * FROM products";
  $runSqlQuery = mysqli_query($conn, $sqlQuery);
  $rowProducts = mysqli_fetch_all($runSqlQuery, MYSQLI_ASSOC);
  return $rowProducts;

}

// product actions
// if user click the create product button
if (isset($_POST['create_product'])) { 
  createProduct($_POST);
}

// if user click the edit product button
if (isset($_GET['edit-product'])) {
  $isEditingProduct = true;
  $product_id = $_GET['edit-product'];
  editProduct($product_id);
}

// if user click the update product button
if (isset($_POST['update_product'])) {
  updateProduct($_POST);
}

// if user click the delete product button
if (isset($_GET['delete-product'])) {
  $product_id = $_GET['delete-product'];
  deletePost($product_id);
}

// create product
function createProduct($request_values) {
  $file_valid = true;
  $file_size_valid = true;

  global $conn, $title, $product_img, $body, $body_id;

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $body_id = mysqli_real_escape_string($conn, $_POST['body_id']);

  // get image name
  $product_img = $_FILES['product_img']['name'];
  $fileTempName = $_FILES['product_img']['tmp_name'];
  $fileSize = $_FILES['product_img']['size'];
  $fileExt = explode('.', $product_img);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png');

  if (!in_array($fileActualExt, $allowed)) {
    $file_valid = false;
    echo "<script>alert('Your file type is wrong! Only jpg, jpeg, png file')</script>";
    echo "<script>window.open('index.php?create-product','_self')</script>";
  } else if ($fileSize > 10000000) {
    $file_size_valid = false;
    echo "<script>alert('Your file is too big!')</script>";
    echo "<script>window.open('index.php?create-post','_self')</script>";
  } else if ($file_valid and $file_size_valid) {
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    move_uploaded_file($fileTempName,"img/product_image/$fileNameNew");

    $query = "INSERT INTO products (title, image, body, body_id) VALUES ('$title', '$fileNameNew', '$body', '$body_id')";
    $run_query = mysqli_query($conn, $query);

    if ($run_query) {
      echo "<script>alert('You have successfully entered data.')</script>";
      echo "<script>window.open('index.php?manage-products','_self')</script>";
    } else {
      echo "<script>alert('You failed entered data.')</script>";
    }
  }
}

// edit product
function editProduct($product_id) {
  global $conn, $title, $product_img, $body, $body_id;

  $sql = "SELECT * FROM products WHERE id = $product_id";
  $result = mysqli_query($conn, $sql);
  $product = mysqli_fetch_assoc($result);
  $title = $product['title'];
  $body = $product['body'];
  $body_id = $product['body_id'];
}

// update prodcut
function updateProduct($request_values) {
  global $conn, $title, $product_img, $body, $body_id;

  $file_valid = true;
  $file_size_valid = true;

  $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $body_id = mysqli_real_escape_string($conn, $_POST['body_id']);


  $product_img = $_FILES['product_img']['name'];
  $fileTempName = $_FILES['product_img']['tmp_name'];
  $fileSize = $_FILES['product_img']['size'];
  $fileExt = explode('.', $product_img);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg', 'jpeg', 'png');

  if (!in_array($fileActualExt, $allowed)) {
    $file_valid = false;
    echo "<script>alert('Your file type is wrong! Only jpg, jpeg, png file')</script>";
    echo "<script>window.open('index.php?create-product','_self')</script>";
  } else if ($fileSize > 10000000) {
    $file_size_valid = false;
    echo "<script>alert('Your file is too big!')</script>";
    echo "<script>window.open('index.php?create-post','_self')</script>";
  } else if ($file_valid and $file_size_valid) {
    $fileNameNew = uniqid('', true).".".$fileActualExt;
    move_uploaded_file($fileTempName,"img/product_image/$fileNameNew");

    $query = "UPDATE products SET title='$title', image='$fileNameNew', body='$body', body_id='$body_id' WHERE id=$product_id";
    $run_query = mysqli_query($conn, $query);
    if ($run_query) {
      echo "<script>alert('You have successfully entered data.')</script>";
      echo "<script>window.open('index.php?manage-products','_self')</script>";
    } else {
      echo "<script>alert('You failed entered data.')</script>";
    }
  }
}

function deletePost($product_id) {
  global $conn;

  $sql = "SELECT * FROM products WHERE id=$product_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  $getImageName = $row['image'];
  $createDeletePath = "img/product_image/" . $getImageName;

  if (unlink($createDeletePath)) {
    $deleteSql = "DELETE FROM products WHERE id = $product_id";
    $rsDelete = mysqli_query($conn, $deleteSql);

    if ($rsDelete) {
      echo "<script>alert('Product successfully deleted.')</script>";
      echo "<script>window.open('index.php?manage-products','_self')</script>";
    }
  }
}
?>