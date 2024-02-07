<script src="js/changetypepass.js"></script>
<script src="js/form.js"></script>

<title>Update Blog</title>
<?php
include('config/auth.php');
require('include/header.php');
$id=$_REQUEST['id'];
$err_msg='';
?>
<?php 
if (isset($_POST['update'])){
  do{
  $email=$_SESSION['email'];
  // Get the uploaded image file
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
<script>
alert('Uploaded image file extension is not allowed.');
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

  
  $myFile=fopen('POST.txt','w');
  
    $sql="UPDATE POSTs SET title='$title',technology='$technology',content='$content',banner='$banner' WHERE POST_id='$id' AND email='$email'";
    $con->query($sql);
    fwrite($myFile,$sql);
    
  if ($con->error) { 
    $err_msg=$con->error;
    break;

      ?>
<script>
alert($con - > errorFailed);
</script><?php
      
      }
      else{
        $err_msg="Blog Updated Successfully..";
          header("Location:../");
  ?> <script>
alert("Blog Updated Successfully");
</script><?php
          }
          ?>
<script>
//location.replace('http://localhost/blogapp/user/');
</script>
<?php
   
       $err_msg=$con->errorFailed;
       break;
          #header("Location:../");
        }while(false);
      }
        

 $email=$_SESSION['email'];
 $sql="SELECT * FROM posts WHERE email='$email' AND post_id='$id'";
 $result=$con->query($sql);
 if(mysqli_num_rows($result)>0){
 while ($row = $result->fetch_assoc()) {
?>
<link rel="stylesheet" href="css/edit_post.css" />
<div class="form">
    <form method="POST" enctype="multipart/form-data" onsubmit=" return validate_form()">

        <div class="login_form_container">
            <div class="login_form">
                <h2>Update Blog One...</h2>
                <?php if(strlen($err_msg)>1)
          { ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?=$err_msg?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
          }?>
                <div class="input_group">
                    <input type="text" value='<?=$row['post_id']?>' name="id" hidden />
                    <!-- <i class="fa fa-user"></i> -->
                    <!--name=" "--><input type="text" value='<?=$row['title']?>' name="title" placeholder="Title"
                        class="input_text" />
                </div>
                <div class="input_group">
                    <!-- <i class="fa fa-unlock-alt"></i> -->
                    <!-- <input
            type="text"
            name="technology"
            id=""
            placeholder="Technology ..."
            class="input_text"
            
          /> -->
                    <span name="tech" id="" placeholder="Technology ..." class="input_tex">Technology</span>
                    <select name="technology" class="input_text tech" value="others">
                        <option value="Business Blogs">Business Blogs</option>
                        <option value="Food Blog">Food Blog</option>
                        <option value="Lifestyle Blog">Lifestyle Blog</option>
                        <option value="others">Others</option>
                    </select>
                </div>
                <div class="input_group">
                    <!-- <i class="fa fa-unlock-alt"></i> -->

                    <textarea name="content" class="input_text textarea" placeholder="Enter Your Content...">
            <?=$row['content']?></textarea>
                </div>
                <div class="input_group">
                    <!-- <i class="fa fa-phone"></i> -->
                    <img src="../uploads/<?=$row['banner']?>" alt="<?=$row['banner']?>" id="banner_img" /><br>
                    <input type="file" name="banner" id="banner_file" class="input_text" required />

                </div>
                <div class="button_group" id="login_button">
                    <input type="submit" name="update" value="Update" class="input_text submit" autocomplete="off" />
                </div>
                <div class="fotter">
                    <a href='index.php' class="nextpage">Not now</a>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<script src="js/change_banner.js"></script>
<?php }}else{?><h1>No Blog Found</h1>
<?php
}
?>