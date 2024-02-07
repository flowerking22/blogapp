
<script>
if(!confirm("Are You Sure Want to Update")){
   
location.replace('http://localhost/blogapp/user/index.php');


}

</script>
<?php
include('../config/auth.php');
require('../../include/connect.php');
    
    $email=$_SESSION['email'];
    

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
if (!in_array($imageExtension, $allowedImageExtensions)) {
  ?><script>alert('Uploaded image file extension is not allowed.');
  alert("Only Supportd ormat 'jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'");
  </script><?php 
  die('Uploaded image file extension is not allowed.');
}
$banner=$image['name'];
// Move the uploaded image file to the desired location
$uploadPath = '../../uploads/' . $image['name'];
if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
  die('Failed to upload image file.');
}

// Success!s
$email=$_SESSION['email'];
$title=$_POST['title'];
$technology=$_POST['technology'];
$content=$_POST['content'];
$content=htmlspecialchars($content,ENT_QUOTES);
$id=$_POST['id'];

$myFile=fopen('post.txt','w');

  $sql="UPDATE posts SET title='$title',technology='$technology',content='$content',banner='$banner' WHERE post_id='$id' AND email='$email'";
  $con->query($sql);
  fwrite($myFile,$sql);
  
if ($con->error) {
    ?>
    <script>
    alert($con->errorFailed);
       
    
    </script><?php
    
    }
    else{
?> <script>
alert("Blog Updated Successfully");
   
</script><?php
        }
        ?>
    <?php
        header("Location:../");
        ?>