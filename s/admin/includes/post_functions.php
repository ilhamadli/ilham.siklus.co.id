<?php 
// post variables
$post_id = 0;
$isEditingPost = false;
$published = 0;
$title = "";
$post_slug = "";
$body = "";
$body_id = "";
$featured_image = "";
$post_topic = "";
$post_category = "";
$highlight = "";
$topic_name = "0";

// get all post from DB
function getAllPosts() {
    global $conn;

    $userSession = $_SESSION['email'];
    $sqlQuery = "SELECT * FROM users WHERE email = '$userSession'";
    $runSqlQuery = mysqli_query($conn, $sqlQuery);
    $rowPost = mysqli_fetch_array($runSqlQuery);
    $user_id = $rowPost['id'];
    $userRole = $rowPost['role'];

    // Admin can view all posts
    // Author can only view their posts
    if ($userRole == "Admin") {
        $sql = "SELECT * FROM posts";
    } elseif ($userRole == "Author") {
        $user_id;
        $sql = "SELECT * FROM posts WHERE user_id= '$user_id'";
    }
    $result = mysqli_query($conn, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $final_posts = array();
    foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
    }
    return $final_posts;
}

// get the author/username of a post
function getPostAuthorById($user_id) {
    global $conn;
	$sql = "SELECT username FROM users WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}

// post actions
// if user clicks the create post button
if (isset($_POST['create_post'])) { createPost($_POST); }

// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}

// if user clicks the update post button
if (isset($_POST['update_post'])) {
	updatePost($_POST);
}

// if user clicks the Delete post button
if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}

function makeSlag(String $string){
	$string = strtolower($string);
	$slag = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slag;
}


// create post
function createPost($request_values) {
    $file_valid = true;
    $file_size_valid = true;
    
    global $conn, $errors, $title, $featured_image, $topic_id, $body, $body_id, $published, $topic_name;

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $body_id = mysqli_real_escape_string($conn, $_POST['body_id']);
    $highlight = mysqli_real_escape_string($conn, $_POST['highlight']);

    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $post_slug = makeSlag($title);
    
    // Get image name
    $featured_img = $_FILES['featured_img']['name'];
    $fileTempName = $_FILES['featured_img']['tmp_name'];
    $fileSize = $_FILES['featured_img']['size'];
    $fileExt = explode('.', $featured_img);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (!in_array($fileActualExt, $allowed)) {
        $file_valid = false;
        echo "<script>alert('Your file type is wrong! Only jpg, jpeg, png file')</script>";
        echo "<script>window.open('index.php?create-post','_self')</script>";
    } else if ($fileSize > 10000000) {
        $file_size_valid = false;
        echo "<script>alert('Your file is too big!')</script>";
        echo "<script>window.open('index.php?create-post','_self')</script>";
    } else if ($file_valid and $file_size_valid) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        move_uploaded_file($fileTempName,"img/post_image/$fileNameNew");

        // Ensure that no post is saved twice. 
        $post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";
        $result = mysqli_query($conn, $post_check_query);
        if (mysqli_num_rows($result) > 0) { 
            // if post exists
            array_push($errors, "A post already exists with that title.");
            echo "<script>alert('A post already exists with that title.')</script>";
            echo "<script>window.open('index.php?create-post','_self')</script>";
        } else {

            global $user_session;
            $us = "SELECT * FROM users WHERE email = '$user_session'";
            $usRun = mysqli_query($conn, $us);
            $usRow = mysqli_fetch_array($usRun);
            $id = $usRow['id'];

            $query = "INSERT INTO posts (user_id, title, slug, image, body, body_id, text_highlight, category, published, created_at, updated_at) 
                    VALUES('$id', '$title', '$post_slug', '$fileNameNew', '$body', '$body_id', '$highlight', '$topic_name', $published, now(), now())";
            $run_query = mysqli_query($conn, $query);
            if ($run_query) {
                echo "<script>alert('You have successfully entered data.')</script>";
                echo "<script>window.open('index.php?manage-posts','_self')</script>";
            } else {
                echo "<script>alert('You failed entered data.')</script>";
                echo "<script>window.open('index.php?create-post','_self')</script>";
            }
        }
    }
}

// edit post
function editPost($role_id) {
    global $conn, $title, $post_slug, $body, $body_id, $published, $isEditingPost, $post_id, $post_category, $highlight, $topic_name;
    // $isEditingPost = true;
    $sql = "SELECT * FROM posts WHERE id=$role_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $post = mysqli_fetch_assoc($result);

    // set form values on the form to be updated
    $title = $post['title'];
    $body = $post['body'];
    $body_id = $post['body_id'];
    $published = $post['published'];
    $highlight = $post['text_highlight'];
}

// update post
function updatePost($request_values) {
    global $conn, $errors, $post_id, $title, $featured_image, $topic_id, $body, $body_id, $published, $topic_name;

    $file_valid = true;
    $file_size_valid = true;
    
    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $body_id = mysqli_real_escape_string($conn, $_POST['body_id']);
    $highlight = mysqli_real_escape_string($conn, $_POST['highlight']);

    // create slug: if title is "The Storm Is Over", return "the-storm-is-over" as slug
    $post_slug = makeSlag($title);

    // Get image name
    $featured_img = $_FILES['featured_img']['name'];
    $fileTempName = $_FILES['featured_img']['tmp_name'];
    $fileSize = $_FILES['featured_img']['size'];
    $fileExt = explode('.', $featured_img);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', '');
    if (!in_array($fileActualExt, $allowed)) {
        $file_valid = false;
        echo "<script>alert('Your file type is wrong!')</script>";
        echo "<script>window.open('index.php?create-post','_self')</script>";
    } else if ($fileSize > 10000000) {
        $file_size_valid = false;
        echo "<script>alert('Your file is too big!')</script>";
        echo "<script>window.open('index.php?create-post','_self')</script>";
    } else if ($file_valid and $file_size_valid) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        move_uploaded_file($fileTempName,"img/post_image/$fileNameNew");

        

        global $user_session;
        $us = "SELECT * FROM users WHERE email = '$user_session'";
        $usRun = mysqli_query($conn, $us);
        $usRow = mysqli_fetch_array($usRun);
        $id = $usRow['id'];

        $query = "UPDATE posts SET title='$title', slug='$post_slug', image='$fileNameNew', body='$body', body_id='$body_id', text_highlight='$highlight', category='$topic_name', published=$published, updated_at=now() WHERE id=$post_id";
        $run_query = mysqli_query($conn, $query);
        if ($run_query) {
            echo "<script>alert('You have successfully updated data.')</script>";
            echo "<script>window.open('index.php?manage-posts','_self')</script>";
        } else {
            echo "<script>alert('You failed entered data.')</script>";
            // echo "<script>window.open('index.php?create-post','_self')</script>";
        }
    }
}

// delete blog post
function deletePost($post_id)
{
    global $conn;

    $sql = "SELECT * FROM posts WHERE id=$post_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $getImageName = $row['image'];

    $createDeletePath = "img/post_image/" . $getImageName;

    if (unlink($createDeletePath)) {
        $deleteSql = "DELETE FROM posts WHERE id=$post_id";
        $rsDelete = mysqli_query($conn, $deleteSql);

        if ($rsDelete) {
            echo "<script>alert('Post successfully deleted.')</script>";
            echo "<script>window.open('index.php?manage-posts','_self')</script>";
        }
        
        exit(0);
    }
}
?>