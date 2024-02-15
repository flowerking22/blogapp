<?php
require_once('include/header.php');
?>
<?php
$err_msg='';
$username='';
$password='';
if (isset($_POST["submit"])) {
    // echo "<script>
    // alert('Post Open');</script>";
  // Process the form data here
  
  $username=trim($_POST['username']);
  $password=trim($_POST['password']);
  
  do{
    if(empty($username)){
      $err_msg="username shold not be empty";
      break;
    }
    if(empty($password)){
      $err_msg="password shold not be empty";
      break;
    }
      // $minLength = 6;
      // $smallLetterPattern = "/[a-z]/";
      // $capitalLetterPattern = "/[A-Z]/";
      // $specialCharPattern = "/[^a-zA-Z0-9]/";
      // // Define patterns for different character types
      // if (strlen($password) < $minLength) {
      //   $err_msg= "Password must be at least $minLength characters long. ";
      //  break;
      // }
    
      // // Check for at least one small letter
      // if (!preg_match($smallLetterPattern, $password)) {
      //   $err_msg= "Password must contain at least one lowercase letter. ";
      //  break;
      // }
    
      // // Check for at least one capital letter
      // if (!preg_match($capitalLetterPattern, $password)) {
      //   $err_msg= "Password must contain at least one uppercase letter. ";
      //  break;
      // }
    
      // // Check for at least one special character
      // if (!preg_match($specialCharPattern, $password)) {
      //   $err_msg= "Password must contain at least one special character. ";
      //  break;
      // }
      // //username
      // $minLength = 6;

    
      // // Check text length
      // if (strlen($username) < $minLength) {
      //  $err_msg= "username must be at least $minLength chars long. ";
      // break;
      // }
      // if(empty($password)){
      //   $err_msg="password shold not be empty";
      //   break;
      // }
      // if(!preg_match ($pattern, $username)) {
      //   $err_msg="Invalid username format. ";
      //  break;
      // }
  $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
  $result=$con->query($sql);
if (!($con->error)) {
    $count = mysqli_num_rows($result);
    if($count==1){
        while ($row = $result->fetch_assoc()) {
            echo "<script>
            alert('Login Successfully');</script>";
                session_start();
                $_SESSION['admin']=$row['username'];
         header('Location:./');
          }
    }
    else{
      $err_msg="username or Passsword worng";
      
// $username='';
// $password='';

        echo "<script>
        alert('Your username or Password was incorrect');</script>";
    }
   
    //header('Location: ./login.php');
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
    echo "<script>
    alert('Failed');</script>";
  }
}while(false);
}

?>
<script>
function close() {
    document.getElementById('toast').style.display = "none";
}
window.onload = function() {
    const toast = document.getElementById('toast');
    const close = document.getElementById('close');
    close.addEventListener('click', function() {
        toast.style.display = 'none !important';
    });
};
</script>
<link rel="stylesheet" href="css/login.css" />
<style>
   .login_form_container{
      position: relative;
      width: 450px;
      
      max-width: 400px;
      max-height:500px;
      background: #040717;
      border-radius: 50px 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      margin-top: 70px;
  }
  </style>

<title>Animated Login From</title>


<form action="" method="POST" onsubmit="return validate">
    <div class="login_form_container">
        <div class="login_form">
            <h3 class="text-center">Admin Login</h3>
            <?php if(strlen($err_msg)>1)
          { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?=$err_msg?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          }?>
            <div class="input_group">
                <i class="fa fa-user"></i>
                <input type="text" placeholder="username ..." name="username" value="<?=$username?>" class="input_text"
                    autocomplete="off" />
            </div>
            <div class="input_group">
                <i class="fa fa-unlock-alt"></i>
                <input type="password" placeholder="Password ..." id="password" name="password" value="<?=$password?>"
                    class="input_text password" autocomplete="off" />
                <i class="fa fa-eye" id="togglePassword"></i>
            </div>
            <div class="button_group" id="login_button">

                <button type="submit" id="submit" name="submit" class="input_text submit" autocomplete="off">
                    <i class="fa fa-right-to-bracket fa-sign-in"></i> Sign In
                </button>
            </div>
            <div class="fotter">
                <!-- <a>Forgot Password ?</a> -->
                <a href="./register.php" class="nextpage">Create Admin</a>
            </div>
        </div>
    </div>
</form>
<!-- 
<div class="toast toast-primary ms-5 position-fixed bottom-0 end-0" id="toast">
  <div class="toast-header">
    <strong class="me-auto">Notification</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" id="close"></button>
  </div>
  <div class="toast-body text-primary">
    This is a notification.
  </div>
</div> -->
<script src="js/changetypepass.js"></script>
<script src="1login.js"></script>