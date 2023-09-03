<?php 
require_once "config.php";

if(isset($_POST['user_reg_btn'])){
  $name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_num = $_POST['user_num'];
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];
  $user_con_password = $_POST['user_con_password'];

  // Count Mobile Number and Email
  $countMobile = stRowCount('mobile',$user_num);
  $countEmail = stRowCount('email',$user_email);


  if(empty($name)){
    $error = "Name is required";
  }
  elseif(empty($user_email)){
    $error = "Email is required";
  }
  elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    $error = "Invalid email format";
  }
  elseif($countEmail!=0){
    $error = "Email already exists, try another one!";
  }
  elseif(empty($user_num)){
    $error = "Mobile Number is required";
  }
  elseif(!is_numeric($user_num)){
    $error = "Mobile Number must be Number";
  }
  elseif(strlen($user_num)!=11){
    $error = "Invalid Mobile Number";
  }
  elseif($countMobile!=0){
    $error = "Mobile Number already exists, try another one!";
  }
  elseif(empty($user_name)){
    $error = "User Name is required";
  }
  elseif(empty($user_password)){
    $error = "Password is required";
  } 

  elseif(empty($user_con_password)){
    $error = "Confirm password is required";
  }
  elseif ($user_password !== $user_con_password) {
  $error = "Password and Confirm password are not matched!";
}

  else{
    $registration_date = date('Y-m-d h:i:s');
    $user_password = SHA1($user_password);
    $user_con_password = SHA1($user_con_password);

    $insert = $pdo-> prepare("INSERT INTO user(
      name,
      email,
      mobile,
      user_name,
      password,
      confrim_pass,
      registration_date 
    ) VALUES(?,?,?,?,?,?,?)");
    $insertStatus = $insert->execute(array(
      $name,
      $user_email,
      $user_num,
      $user_name,
      $user_password,
      $user_con_password,
      $registration_date
    ));
    if($insertStatus==true){
      $success = "Your Registration Successfull";
    }
    else{
      $error = "Your Registration Failed try again!";
    }
  }

}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>sing up</title>

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
          <h3>Sing Up</h3>
          <div class="inputBox">
            <span class="fas fa-user"></span>
            <input type="text" name="user_name" placeholder="full name" />
          </div>
          <div class="inputBox">
            <span class="fas fa-envelope"></span>
            <input type="email" name="user_email" placeholder="email" />
          </div>
          <div class="inputBox">
            <span class="fas fa-phone"></span>
            <input type="text" name="user_num" placeholder="number" />
          </div>
          <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input type="password" name="user_password" placeholder="password" />
          </div>
          <div class="inputBox">
            <span class="fas fa-lock"></span>
            <input type="password" name="user_con_password" placeholder="confirm password" />
          </div>
          <input type="submit" name="user_reg_btn" value="register" class="btn" />
        </form>
      </div>
    </section>

    <!-- contact section ends -->

    <!-- custom js file link  -->
    <script src="assets/js/script.js"></script>
  </body>
</html>
