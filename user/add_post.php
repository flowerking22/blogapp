<?php
include_once('config/auth.php');
require_once('include/header.php');
?>
<link rel="stylesheet" href="css/add_post.css"/>
<style>
   .tech{
    background-color: #00ccff;
    color:white;
  }
  .tech:hover{
    background-color: #0c1022;
  }
  </style>
<?php

if (isset($_POST["submit"])) {
    echo "<script>
    alert('Post Open');</script>";
  // Process the form data here



// Get the uploaded image file
$image = $_FILES['banner'];

// Make sure the file is an image 
if (!is_uploaded_file($image['tmp_name'])) {
  die('Uploaded file is not an image.');

}

// Get the image file extension
$imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

// Make sure the image file extension is allowed
$allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'];
if (in_array($imageExtension, $allowedImageExtensions)) {
  ?>
  <script>alert('Uploaded image file extension is not allowed.');
   alert("Only Supportd ormat 'jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'");
   location.replace('http://localhost/blogapp/user');
   </script>
   <?php 
}
$banner=$image['name'];
// Move the uploaded image file to the desired location
$uploadPath = '../uploads/' . $image['name'];
if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
  die('Failed to upload image file.');
}

// Success!s
$email=$_SESSION['email'];
$title=$_POST['title'];
$technology=$_POST['technology'];
$content=$_POST['content'];
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
  }
  
}
?>
<script src="js/changetypepass.js"></script>
<link rel="stylesheet" href="css/add_post.css" />
<title>Add New Blog</title>
<form action="" method="POST" enctype="multipart/form-data">

    <div class="login_form_container">
      <div class="login_form">
        <h2>Create New One...</h2>
        <div class="input_group">
          <!-- <i class="fa fa-user"></i> -->
          <!--name=" "--><input
            type="text"
            name="title"
            placeholder="Title"
            class="input_text"
           
          />
        </div>
        <div class="input_group">
          <!-- <i class="fa fa-user"></i> -->
          <!--name=" "<input
            type="text"
            name="technology"
            placeholder="technology"
            class="input_text"
           
          />
-->
          <span  name="tech"
            id=""
            placeholder="Technology ..."
            class="input_tex">Technology</span>
          <select name="technology" class="input_text tech" value="others">
            <option value="Business Blogs">Business Blogs</option>
            <option value="Food Blog">Food Blog</option>
            <option value="Lifestyle Blog">Lifestyle Blog</option>
            <option value="others">Others</option>
</select>
        </div>
        <!--<div class="input_group">
           <i class="fa fa-unlock-alt"></i> -->
          <!-- <input
            type="text"
            name="technology"
            id=""
            placeholder="Technology ..."
            class="input_text"
            
          /> -
          <span  name="tech"
            id=""
            placeholder="Technology ..."
            class="input_tex">Technology</span>
          <select name="technology" class="input_text tech" value="----">
            <option value="Business Blogs">Business Blogs</option>
            <option value="Food Blog">Food Blog</option>
            <option value="Lifestyle Blog">Lifestyle Blog</option>
            <option value="others">Others</option>
</select>
        </div>-->
        <div class="input_group">
          <!-- <i class="fa fa-unlock-alt"></i> -->

          <textarea name="content" class="input_text textarea" placeholder="Enter Your Content..."></textarea>
</div>
        <div class="input_group">
        <img src="" alt="" id="banner_img"/>
     
          <!-- <i class="fa fa-phone"></i> -->
        
        </div>
        <div class="input_group">
    
          <!-- <i class="fa fa-phone"></i> -->
          <input
            type="file"
            name="banner"
            id="banner_file"
            class="input_text"
          />
        </div>
        <div class="button_group" id="login_button">
     
        <input
            type="submit"
            name="submit"
            value="Add"
            class="input_text submit"
            autocomplete="off"
          />
        </div>
        <div class="fotter">
          <a href='index.php' class="nextpage">Not now</a>
        </div>
      </div>
    </div>
</form>
<script src="js/change_banner.js"></script>