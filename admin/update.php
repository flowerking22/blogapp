<?php
include_once('config/auth.php');
require_once('include/header.php');

?>
<link rel="stylesheet" href="css/update.css" />
<script src="js/changetypepass.js"></script>
<script src="js/form.js"></script>
<?php
$err_msg="";
if(!isset($_REQUEST['id'])){
  header("Location:./");
}
    $id=$_REQUEST['id'];
 $sql="SELECT * FROM posts WHERE post_id='$id'";
 $result=$con->query($sql);
 $row = $result->fetch_assoc();
    $title=$row['title'];
    $technology=$row['technology'];
    $content=$row['content'];
    $banner=$row['banner'];
    ?>

<?php
if (isset($_POST["submit"])) {
 
    do{
      $title=ucwords(trim($_POST['title']));
      // $id=$_POST['id'];
      $technology=ucwords(trim($_POST['technology']));
      $content=trim($_POST['content']);
      $filechanged=$_POST['filechanged'];
      $fileflag=($filechanged=="true")?true:false;
      if($fileflag){
        $image = $_FILES['banner'];
        $banner=$image['name'];
      }
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
      if($fileflag){
  if (!is_uploaded_file($image['tmp_name'])) {
    $err_msg='Uploaded file is not an image.';
    break;
  
  }
  
  // Get the image file extension
  $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
  
  // Make sure the image file extension is allowed
  $allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico','jfif'];
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
  /*$sql="INSERT INTO posts(email,title,technology,banner,content) VALUES('$email','$title','$technology','$image["name"]','$content')";
  */
  $content=htmlspecialchars($content,ENT_QUOTES);
  $sql="UPDATE POSTs SET title='$title',technology='$technology',content='$content',banner='$banner' WHERE POST_id='$id'";
  $con->query($sql);
//   fwrite($myFile,$sql);
}
else{
  $content=htmlspecialchars($content,ENT_QUOTES);
  $sql="UPDATE POSTs SET title='$title',technology='$technology',content='$content' WHERE POST_id='$id'";
  $con->query($sql);
}
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
        header("Location:./");
?> <script>
alert("Blog Updated Successfully");
</script><?php
        } }while(false);
  }
  
?>

<link rel="stylesheet" href="form.css">
<script src="js/add_post.js"></script>
<div class="container">
    <!-- <h1 class="text-center">Responsive Form</h1> -->
    <div class="row justify-content-center">
        <form class=" form col-9 col-md-6" method="POST" enctype="multipart/form-data" action="">
            <?php if(strlen($err_msg)>1)
          { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?=$err_msg?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
          }?>
            <div class=" ">
                <input type="hidden" name="id" value=<?=$id?> />
                <input type="text"   id="filechanged" value="false" name="filechanged" hidden>
                <label for="textInput" class="form-label">Title</label>
                <input type="text" class="form-control" autocomplete="off" id="name" value="<?=$title?>" name="title"
                    placeholder="Enter Blog Title">
            </div>
            <div class=" ">
                <label for="emailInput" class="form-label">Domain</label>
                <input type="text" class="form-control" id="emailInput" value="<?=$technology?>" autocomplete="off"
                    name="technology" placeholder="Enter Blog Type">
            </div>
            <div class=" ">
                <label for="textareaInput" class="form-label">Content</label>
                <textarea class="form-control" id="textareaInput" rows="3" style="height: 200px;"
                    placeholder="Explain main content here.." name="content"><?=$content?></textarea>
            </div>
            <div class=" ">
                <label for="fileInput" class="form-label">Banner Post Image</label><br>
                <!-- <div class="col-12 "> -->
                <img id="banner_img" src="../uploads/<?=$banner?>." accept=".jpg, .jpeg, .png, .gif, .apng, .svg, .bmp, .ico"
                    alt="Select Image" class="img-fluid col-12" style="height:15rem">
                <!-- </div>
                <div class="col-12  align-items-center"> -->
                <input type="file" class="form-control " id="banner_file" name="banner" value="http://localhost/blogapp/uploads/image21-1.jpg.">
            </div>

            <!-- </div> -->
            <div class=" ">
                <input type="submit" name="submit" class="btn btn-primary form-control" />
            </div>
        </form>
    </div>
</div>
<script src="js/next_input.js"></script>
<script>
const banner_file=document.getElementById('banner_file');
const banner_img=document.getElementById('banner_img');
var filechanged=document.getElementById('filechanged');
banner_file.addEventListener('change',function(){
    banner_img.src=URL.createObjectURL(banner_file.files[0]);
    document.getElementById('filechanged').value="true";
});
  </script>
<!-- <script src="js/change_banner.js"></script> -->