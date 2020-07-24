<?php
  require_once('config.php');

  $firstNameErr = $lastNameErr = $emailErr = $telephoneErr = $locationErr = $messageErr = "";
  $firstName = $lastName = $email = $telephone = $location = $message = "";
  $result = "";

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // First name validation
    if (empty($_POST['firstName'])) {
      $firstNameErr = "*First name is required";
    } else {
      $firstName = test_input($_POST['firstName']);
      // check if name only contains letter and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $firstName)) {
        $firstNameErr = "*Only letters and white space allowed";
      }
    }

    // Last name validation
    if (empty($_POST['lastName'])) {
      $lastNameErr = "*Last name is required";
    } else {
      $lastName = test_input($_POST['lastName']);
      // check if name only contains letter and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/", $lastName)) {
        $lastNameErr = "*Only letters and white space allowed";
      }
    }

    // Email validation
    if (empty($_POST['email'])) {
      $emailErr = "*Email is required";
    } else {
      $email = test_input($_POST['email']);
      // check if email address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "*Invalid email format";
      }
    }

    // Telephone validation
    if (empty($_POST['telephone'])) {
      $telephoneErr = "*Telephone is required";
    } else {
      $telephone = test_input($_POST['telephone']);
      // check if telephone only contains number
      if(!preg_match("/^[0-9]*$/", $telephone)) {
        $telephoneErr = "*Only number allowed";
      }
    }

    // Location validation
    if (empty($_POST['location'])) {
      $locationErr = "*Location is required";
    } else {
      $location = test_input($_POST['location']);
    }

    // Message validation
    if (empty($_POST['message'])) {
      $messageErr = "*message is required";
    } else {
      $message = test_input($_POST['message']);
    }

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($telephone) && !empty($location) && !empty($message)) {

      if (preg_match("/^[a-zA-Z ]*$/", $firstName) && preg_match("/^[a-zA-Z ]*$/", $lastName) && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match("/^[0-9]*$/", $telephone)) {

        require( ROOT_PATH . '/lib/phpmailer/PHPMailerAutoload.php');

        $messages = file_get_contents('email-template.html');

        $messages = str_replace('%firstname%', $firstName, $messages);
        $messages = str_replace('%lastname%', $lastName, $messages);
        $messages = str_replace('%telephone%', $telephone, $messages);
        $messages = str_replace('%email%', $email, $messages);
        $messages = str_replace('%location%', $location, $messages);
        $messages = str_replace('%message%', $message, $messages);

        $mail = new PHPMailer;

        $mail->IsSMTP();
        $mail->Host = 'siklus.co.id';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@siklus.co.id';
        $mail->Password = 'n&,[3QUCud5s';
        $mail->SMTPSecure = 'ssl';

        $mail->setFrom($_POST['email'],$_POST['firstName']);
        $mail->addAddress('admin@siklus.co.id');
        
        $mail->IsHTML(true);
        $mail->Subject = 'Form Submission Order';
        // $mail->Body = 
        // '<h1 align=center>Name:'.$firstName.' '.$lastName.'<br>Email:'.$email.'<br>Telephone:'.$telephone.'<br>Location:'.$location.'<br>Message:'.$message.'</h1>';

        $mail->MsgHTML($messages);

        if(!$mail->send()) {
          $result = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
          // $result = "Thanks ".$_POST['firstName']." for contacting us. We'll get back to you soon";
          echo "<script>alert('Thanks $firstName for contacting us We will get back to you soon')</script>";
          echo "<script>window.open('index.php#product-section','_self')</script>";
          exit;
        }

      }
    }
  }

  function test_input($data) {
    $data = trim ($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siklus - Order page</title>

  <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="css/icomoon.css" type="text/css">
</head>
<body>
  
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-2 align-self-center">
          <div class="agent-avatar-box d-flex justify-content-center">
            <img src="images/product-image.jfif" alt="product-image" class="product-img">
          </div>
        </div>
        <div class="col-sm-6 col-md-8 col-lg-10">
          <h1 class="title-single title-border">Product Title</h1>
          <p class="color-text-a">Aut voluptas consequatur unde sed omnis ex placeat quis eos. Aut natus officia corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae possimus qui ducimus.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 section-t8" style="padding-top: 2rem;">
          <div class="row">
            <div class="col-md-12">
              <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" role="form" class="form-a contactForm">
                <div class="row">

                  <!-- First name -->
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="firstName" class="form-control form-control-lg form-control-a" placeholder="Your First name">
                      <small class="text-danger"><?= $firstNameErr ?></small>
                      <p style="font-size: 12px">Please make sure your first name is entered correctly for ordering purposes.</p>
                    </div>
                  </div>

                  <!-- Last name -->
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="lastName" type="text" class="form-control form-control-lg form-control-a" placeholder="Your Last Name">
                      <small class="text-danger"><?= $lastNameErr ?></small>
                      <p style="font-size: 12px">Please make sure your last name is entered correctly for ordering purposes.</p>
                    </div>
                  </div>

                  <!-- Telephone -->
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="telephone" type="text" class="form-control form-control-lg form-control-a" placeholder="Your Telephone Number">
                      <small class="text-danger"><?= $telephoneErr ?></small>
                      <p style="font-size: 12px">Please make sure the number is entered correctly.</p>
                    </div>
                  </div>

                  <!-- Email -->
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email">
                      <small class="text-danger"><?= $emailErr ?></small>
                      <p style="font-size: 12px">Please make sure email address is entered correctly.</p>
                    </div>
                  </div>

                  <!-- Location -->
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" name="location" class="form-control form-control-lg form-control-a" placeholder="Location">
                      <small class="text-danger"><?= $locationErr ?></small>
                      <p style="font-size: 12px">Please make sure location address is entered correctly.</p>
                    </div>
                  </div>

                  <!-- Message -->
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <textarea name="message" class="form-control" name="message" cols="45" rows="8" placeholder="Message"></textarea>
                      <small class="text-danger"><?= $messageErr ?></small>
                      <p style="font-size: 12px">Enter product details such as color, size, materials etc. and other specification requirements to receive an accurate quote.</p>
                    </div>
                  </div>

                  <!-- Submit button -->
                  <div class="col-md-12">
                    <input type="submit" name="submit" value="Send Inquiry" class="btn btn-a" id="sendBtn">
                  </div>
                </div>
              </form>
              <div class="col-md-6 pl-0 mt-4">
                <?= $result; ?>
                <p style="font-size: 16px; font-style: italic;">
                  For further information you can contact us via email and telephone
                  <br>
                  <b>Phone: </b>+54 356 945234
                  <br>
                  <b>Email: </b>agents@example.com
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>