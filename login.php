<?php 
require_once "config.php";
session_start();
if (isset($_SESSION['role'])) {
    header("location: index.php");
}

if(isset($_POST['user_login_btn'])){
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];

  


  if(empty($user_email)){
    $error = "Email or Mobile is required!";
  }
  elseif(empty($user_password)){
    $error = "Password is required!";
  } 


  else{

    $user_password = SHA1($user_password);

    $stCount = $pdo-> prepare("SELECT id, FROM user WHERE (email=? OR	mobile=?) AND password=?");
    $stCount->execute(array($user_email,$user_email,$user_password)); 
    $loginCount = $stCount->rowCount();

    


    if($loginCount==1){
      $success = "Login Successfull";
      $user = $stCount->fetch(PDO::FETCH_ASSOC);
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['role'] =  "user";

      header("location: index.php");
    }
    else{
      $error = "Email and password doesn't match try again!";
    }
  }

}
require_once "header.php";

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- contact section starts  -->

    <section class="contact user-login" id="contact">
      <div class="row">
        <form action="" method="POST">
          <?php if(isset($error)): ?>
            <div class="error-message">
              <?php echo $error; ?>
           </div>
          <?php endif; ?>
          <?php if(isset($success)): ?>
            <div class="success-message">
              <?php echo $success; ?>
            </div>
          <?php endif; ?>
          <h3>Login</h3>
          <div class="inputBox">
            <span class="fas fa-envelope"></span>
            <input type="email" name="user_email" placeholder="email or mobile number" />
          </div>
          <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input type="password" name="user_password" placeholder="password" />
          </div>
          <input type="submit" name="user_login_btn" value="Login" class="btn" />
        </form>
      </div>
    </section>

    <!-- contact section ends -->

    <!-- custom js file link  -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
