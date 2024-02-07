<?php
include_once('config/auth.php');
require_once('include/header.php');
?>
<?php

$err_msg='';
$title='';
$technology='';
$content='';
$banner='';
if (isset($_POST["submit"])) {
 
  do{
    $email=$_SESSION['email'];
    $title=$_POST['title'];
    $technology=$_POST['technology'];
    $content=$_POST['content'];
    $image = $_FILES['banner'];
    $banner=$image['name'];
    
    if(empty($title)){
      $err_msg="title shold not be empty";
      break;
    }
    if(strlen($title)<3){
      $err_msg="title length should be more than 3";
      break;
    }
    if(empty($technology)){
      $err_msg="technology shold not be empty";
      break;
    }
    if(strlen($technology)<3){
      $err_msg="technology length should be more than 3";
      break;
    }
    if(empty($content)){
      $err_msg="content shold not be empty";
      break;
    }
    if(strlen($content)<10){
      $err_msg="content length should be more than 10";
      break;
    }
if (!is_uploaded_file($image['tmp_name'])) {
  $err_msg='Uploaded file is not an image.';
  break;

}

// Get the image file extension
$imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

// Make sure the image file extension is allowed
$allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'];
if (!in_array($imageExtension, $allowedImageExtensions)) {

  ?>
  <script>alert('Uploaded image file extension is not allowed.');
   //alert("Only Supportd ormat 'jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'");
   //location.replace('http://localhost/blogapp/user');
   </script>
   <?php  $err_msg="Only Supportd format 'jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'";
  break;
}

// Move the uploaded image file to the desired location
$uploadPath = '../uploads/' . $image['name'];
if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
  $err_msg='Failed to upload image file.';
  break;
}

// Success!s
/*$sql="INSERT INTO posts(email,title,technology,banner,content) VALUES('$email','$title','$technology','$image["name"]','$content')";
*/
$content=htmlspecialchars($content,ENT_QUOTES);
  $sql="INSERT INTO posts(email,title,technology,content,banner) VALUES('$email','$title','$technology','$content','$banner')";
  ?><script>
  alert(<?=$sql?>);</script>
  <?php
  $con->query($sql);
  if (!($con->error)) {
    ?><script>
    alert('New Post Created Successfully');</script>
    <?php
    $con->query("UPDATE users SET no_post=no_post+1 WHERE email='$email'");
    header('Location:index.php');
  } else {
    ?><script>
    alert('Error: . <?=$sql?> <br>. <?=$con->errorFailed?>');</script>
    <?php
    $err_msg=$con->errorFailed;
    break;
  }
  }while(false);
}
?>

<link rel="stylesheet" href="form.css">
<script src="js/add_post.js" ></script>
<div class="container">
    <!-- <h1 class="text-center">Responsive Form</h1> -->
    <div class="row justify-content-center">
        <form class=" form col-9 col-md-6" method="POST" enctype="multipart/form-data" action="" >
        <?php if(strlen($err_msg)>1)
          { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?=$err_msg?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          }?>
            <div class=" ">
                <label for="textInput" class="form-label">Title</label>
                <input type="text" class="form-control" autocomplete="off" id="name" 
                value="<?=$title?>"name="title"  placeholder="Enter Blog Title">
            </div>
            <div class=" ">
                <label for="emailInput" class="form-label">Domain</label>
                <input type="text" class="form-control" id="emailInput"
               value="<?=$technology?>" autocomplete="off" name="technology" 
                placeholder="Enter Blog Type">
            </div>
            <div class=" ">
                <label for="textareaInput" class="form-label">Content</label>
                <textarea class="form-control" id="textareaInput" rows="3" 
                style="height: 200px;" placeholder="Explain main content here.."
                      name="content"><?=$content?></textarea>
            </div>
            <div class=" ">
                <label for="fileInput" class="form-label">Banner Post Image</label><br>
                <!-- <div class="col-12 "> -->
                <img id="banner_img"  src="<?=$banner?>" accept=".jpg, .jpeg, .png, .gif, .apng, .svg, .bmp, .ico" alt="Select Image"class="img-fluid col-12"  style="height:15rem">
                <!-- </div>
                <div class="col-12  align-items-center"> -->
                    <input type="file" class="form-control " id="banner_file"
                 name="banner">
                </div>
              
            <!-- </div> -->
            <div class=" ">
                <input type="submit" name="submit" class="btn btn-primary form-control" />
            </div>
        </form>
    </div>
</div>
<script src="js/next_input.js"></script>
<script src="js/change_banner.js"></script>