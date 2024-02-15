<?php
include('include/header.php');
?>
<?php
 $err_msg='';
 
 $username = '';
 $password='';

//  $email='';
//  $phone='';
 
if (isset($_POST["submit"])) {
    // echo "<script>
    // alert('Post Open');</script>";
  // Process the form data here
  $err_msg='';
  $username = trim($_POST['username']);

  $password=trim($_POST['password']);
  
  // $email= $_POST['email'];
  // $phone=$_POST['phone'];
  do{
    if(empty($username)){
      $err_msg="username shold not be empty";
      break;
    }
    if(strlen($username)<2){
      $err_msg="username length should be than 2 ";
      break;
    }
    //password
    if(empty($password)){
      $err_msg="password shold not be empty";
      break;
    }
      $minLength = 6;
    
      // Define patterns for different character types
      // $smallLetterPattern = "/[a-z]/";
      // $capitalLetterPattern = "/[A-Z]/";
      // $specialCharPattern = "/[^a-zA-Z0-9]/";
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
      // //email
      // if(empty($email)){
      //   $err_msg="Email shold not be empty";
      //   break;
      // }
      // $minLength = 6;

      
      // $emailPattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
      // $pattern = "/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
      // // Check text length
      // if (strlen($email) < $minLength) {
      //  $err_msg= "email must be at least $minLength chars long. ";
      // break;
      // }
      // // if(!preg_match ($pattern, $email)) {
      // //   $err_msg="Invalid email format. ";
      // //  break;
      // // }


      // //phone
      // if(empty($phone)){
      //   $err_msg="Phone shold not be empty";
      //   break;
      // }
      // $minLength=strlen($phone);
      // if (!(strlen($phone)>9 && strlen($phone)<11)){
      //   $err_msg= "phone must be at 10 chars . ";
      //  break;
      //  }
      //  $pattern = "/^[6789][0-9]{9}$/";
      // if(!preg_match($pattern,$phone)){
      //   $err_msg= "phone number is not valid";
      //  break;
      // }
      $sql="insert into admin(username,password) values('$username','$password')";
  $con->query($sql);
  if (!($con->error)) {
    session_start();
    // $_SESSION['admin']=$username;
    echo "<script>
    alert('New Record Created Successfully');</script>";
    header('Location: ./login.php');
  } else {
    echo "Error: " . $sql . "<br>" . $con->error;
    $err_msg=$con->error;
    echo "<script>
    alert('Failed');</script>";
  }
}while(false);
}

?>
<script src="js/changetypepass.js"></script>
<link rel="stylesheet" href="css/register.css" />
<style>
   .login_form_container{
      position: relative;
      width: 450px;
      height:450px;
      max-width: 500px;
     max-height:600px;
      background: #040717;
      border-radius: 50px 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      margin-top: 70px;
  }
  </style>
<title>AdminPage</title>
<form action="" method="POST">

    <div class="login_form_container">
        <div class="login_form">
            <?php if(strlen($err_msg)>1)
          { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?=$err_msg?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          }?>
            <h3 class="text-center">Admin Registeration</h3>
            <div class="input_group">
                <i class="fa fa-user"></i>
                <!--username=" "--><input type="text" name="username" value="<?=$username?>" 
                placeholder="Username ..."
                    class="input_text"  />
            </div>
            <div class="input_group">
                <i class="fa fa-unlock-alt"></i>
                <input type="password" name="password" required value="<?=$password?>" id="password"
                    placeholder="Password ..." class="input_text"  />
                <i class="fa fa-eye" id="togglePassword"></i>
            </div>
           
            <div class="button_group" id="login_button">
                <button type="submit" name="submit" class="input_text submit" autocomplete="off"><i
                        class="fa fa-user-plus"></i>Sign Up</button>

            </div>
            <div class="fotter">
                <a href='login.php' class="nextpage">Existing Admin</a>
            </div>

        </div>
    </div>
</form>