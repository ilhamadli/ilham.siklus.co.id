<?php 
    // get all posts
    function getPosts() {
        global $conn;
        $sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $posts;
    }

    function getAllPosts() {
        global $conn;
        $sql = "SELECT * FROM posts ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $posts;
    }

    function getSinglePost() {
        global $conn;

        $post_slug = $_GET['post-slug'];
        $getArticle = "SELECT * FROM posts WHERE slug = '$post_slug'";
        $rGetArticle = mysqli_query($conn, $getArticle);
        $post = mysqli_fetch_assoc($rGetArticle);

        return $post;
    }

    function getAllProducts() {
        global $conn;
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
        $result = mysqli_query($conn, $sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $products;
    }

    function getSingleProduct() {
        global $conn;

        $title = $_GET['title'];
        $getProduct = "SELECT * FROM products WHERE title = '$title'";
        $rGetProduct = mysqli_query($conn, $getProduct);
        $product = mysqli_fetch_assoc($rGetProduct);

        return $product;
    }

    function getCategory() {
        global $conn;

        $category = $_GET['category'];
        $getCategory = "SELECT * FROM posts WHERE category = '$category'";
        $rGetCategory = mysqli_query($conn, $getCategory);
        $posts = mysqli_fetch_assoc($rGetCategory);

        return $posts;
    }
?>