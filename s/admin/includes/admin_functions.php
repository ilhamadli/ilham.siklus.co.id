<?php 

// admin users variables
$admin_id = 0;
$isEditingUser = false;
$username = "";
$role = "";
$email = "";

// general variables
$errors = [];

// topic variables
$topic_id = 0;
$isEditingPost = false;
$topic_name = "";

// admin actions
// if user clicks the create button
if (isset($_POST['create_admin'])) {
	createAdmin($_POST);
}
// if user clicks the Edit button
if (isset($_GET['edit-user'])) {
	$isEditingUser = true;
	$admin_id = $_GET['edit-user'];
	editAdmin($admin_id);
}
// if user clicks the update button
if (isset($_POST['update_admin'])) {
	updateAdmin($_POST);
}
// if user clicks the Delete button
if (isset($_GET['delete-user'])) {
	$admin_id = $_GET['delete-user'];
	deleteAdmin($admin_id);
}

function esc(String $value) {
    global $conn;
    $val = trim($value);
    $val = mysqli_real_escape_string($conn, $value);
    return $val;
}


// create user
function createAdmin($request_values) {
    global $conn, $errors, $role, $username, $email;

    $file_valid = true;
    $file_size_valid = true;

    $username = esc($request_values['username']);
    $email = esc($request_values['email']);
    $password = esc($request_values['password']);
    $passwordConfirmation = esc($request_values['passwordConfirmation']);

    if (isset($request_values['role'])) {
        $role = esc($request_values['role']);
    }

    // Get image name
    $profile_img = $_FILES['profile_img']['name'];
    $fileTempName = $_FILES['profile_img']['tmp_name'];
    $fileSize = $_FILES['profile_img']['size'];
    $fileExt = explode('.', $profile_img);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (!in_array($fileActualExt, $allowed)) {
        $file_valid = false;
        echo "<script>alert('Your file type is wrong!')</script>";
        echo "<script>window.open('index.php?create-user','_self')</script>";
    } else if ($fileSize > 10000000) {
        $file_size_valid = false;
        echo "<script>alert('Your file is too big!')</script>";
        echo "<script>window.open('index.php?create-user','_self')</script>";
    } else if ($file_valid and $file_size_valid) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        move_uploaded_file($fileTempName,"img/$fileNameNew");
    }

    // form validation: ensure that the form is correctly filled
    if (empty($username)) { array_push($errors, "Uhmm...We gonna need the username"); }
    if (empty($email)) { array_push($errors, "Oops.. Email is missing"); }
	if (empty($role)) { array_push($errors, "Role is required for admin users");}
	if (empty($password)) { array_push($errors, "uh-oh you forgot the password"); }
    if ($password != $passwordConfirmation) { array_push($errors, "The two passwords do not match"); }
    
    // Ensure that no user is registered twice. 
    // the email and usernames should be unique
    $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    // if user exist
    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exist");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exist");
        }
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "INSERT INTO users (username, email, role, password, image, created_at, updated_at)
                  VALUES ('$username', '$email', '$role', '$password', '$fileNameNew', now(), now())";
        mysqli_query($conn, $query);
        echo "<script>alert('You have successfully entered data.')</script>";
        echo "<script>window.open('index.php?manage-users','_self')</script>";
        exit(0);
    }
}

// Returns all users and their corresponding roles
function getAdminUsers() {
    global $conn, $roles;
    $user_session = $_SESSION['email'];

    $sql = "SELECT * FROM users WHERE id NOT IN (SELECT id FROM users WHERE id=2)";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $users;
}

// edit user
function editAdmin($admin_id) {
    global $conn, $username, $role, $isEditingUser, $admin_id, $email;

    $sql = "SELECT * FROM users WHERE id=$admin_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $admin = mysqli_fetch_assoc($result);

    // set form values ($username and $email) on the form to be updated
	$username = $admin['username'];
	$email = $admin['email'];
}

// update user
function updateAdmin($request_values) {
    global $conn, $errors, $role, $username, $isEditingUser, $admin_id, $email;

    $file_valid = true;
    $file_size_valid = true;

    // get id of the admin to be updated
    $admin_id = $request_values['admin_id'];
    
    // set edit state to false
    $isEditingUser = false;
    
    $username = esc($request_values['username']);
	$email = esc($request_values['email']);
	$password = esc($request_values['password']);
    $passwordConfirmation = esc($request_values['passwordConfirmation']);
    if(isset($request_values['role'])){
		$role = $request_values['role'];
    }

    $profile_img = $_FILES['profile_img']['name'];
    $fileTempName = $_FILES['profile_img']['tmp_name'];
    $fileSize = $_FILES['profile_img']['size'];
    $fileExt = explode('.', $profile_img);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (!in_array($fileActualExt, $allowed)) {
        $file_valid = false;
        echo "<script>alert('Your file type is wrong!')</script>";
        echo "<script>window.open('index.php?create-user','_self')</script>";
    } else if ($fileSize > 10000000) {
        $file_size_valid = false;
        echo "<script>alert('Your file is too big!')</script>";
        echo "<script>window.open('index.php?create-user','_self')</script>";
    } else if ($file_valid and $file_size_valid) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        move_uploaded_file($fileTempName,"img/$fileNameNew");
    }
    
    // register user if there are no errors in the form
    if (count($errors) == 0) {
		//encrypt the password (security purposes)
		$password = md5($password);

		$query = "UPDATE users SET username='$username', email='$email', role='$role', password='$password', image='$fileNameNew' WHERE id=$admin_id";
		mysqli_query($conn, $query);

		echo "<script>alert('You have successfully updated data.')</script>";
		echo "<script>window.open('index.php?manage-users','_self')</script>";
		exit(0);
	}
}

// delete user
function deleteAdmin($admin_id) {
	global $conn;
	$createDeletePath = "";
    $sql = "SELECT * FROM users WHERE id=$admin_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $getImageName = $row['image'];
    $createDeletePath = "img/" . $getImageName;

    if (unlink($createDeletePath)) {
        $deleteSql = "DELETE FROM users WHERE id=$admin_id";
        $rsDelete = mysqli_query($conn, $deleteSql);

        if ($rsDelete) {
            echo "<script>alert('User successfully deleted.')</script>";
            echo "<script>window.open('index.php?manage-users','_self')</script>";
        }
        
        exit(0);
    }
}

// topic actions
// if user clicks the create topic button
// if (isset($_POST['create_post'])) { createTopic($_POST); }

// get all topics form DB
function getAllTopics() {
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}

?>