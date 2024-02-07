<script src="js/changetypepass.js"></script>
<script src="js/form.js"></script>


<title>Update Blog</title>
<?php
include('config/auth.php');
require('include/header.php');
?>
<?php 
if (isset($_POST['update'])){
  $email=$_SESSION['email'];
  $title=$_POST['title'];
  $technology=$_POST['technology'];
  $content=$_POST['content'];
  $content=htmlspecialchars($content,ENT_QUOTES);
  $id=$_POST['id'];
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
  $allowedImageExtensions = ['ico'];
  if (!in_array($imageExtension, $allowedImageExtensions)) {
    echo "<script>
    alert('Uploaded Image Format is not Support');
    location.replace('http://localhost/blogapp/user/edit_post.php?id='+$id);
    </script>";
    ?>

    <?php
    #header("Location:../");
    ?><script>alert("Uploaded image file extension is not allowed.");
    alert("Only Supportd format "jpg", "jpeg", "png", "gif","apng", "svg", "bmp","ico", "png","ico"");
    location.replace("http://localhost/blogapp/user/edit_post.php?id="+<?=$id?>);
    </script>
    <?php
   #die('Uploaded image file extension is not allowed.');
  }
  $banner=$image['name'];
  // Move the uploaded image file to the desired location
  $uploadPath = '../uploads/' . $image['name'];
  if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
  ?>
  <script>
  alert('Failed to upload image file.');
  </script>
  <?php
  }
  
  // Success!s

  
  $myFile=fopen('POST.txt','w');
  
    $sql="UPDATE POSTs SET title='$title',technology='$technology',content='$content',banner='$banner' WHERE POST_id='$id' AND email='$email'";
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
          <script>//location.replace('http://localhost/blogapp/user/');</script>
      <?php
          #header("Location:../");
          
      }
          ?>
          <script src="js/edit_post.js"></script>
<?php
 $id=$_REQUEST['id'];
 $email=$_SESSION['email'];
 $sql="SELECT * FROM posts WHERE email='$email' AND post_id='$id'";
 $result=$con->query($sql);
 if(mysqli_num_rows($result)>0){
 while ($row = $result->fetch_assoc()) {
?>
<link rel="stylesheet" href="css/edit_post.css" />
<<!--script src="js/edit_post.js"></script
<script>
  const banner_file=document.getElementById('banner_file');
const banner_img=document.getElementById('banner_img');
banner_file.addEventListener('change',function(){
    console.log(banner_file);
    console.log("Image Changed");
    banner_img.src=URL.createObjectURL(banner_file.files[0]);
});
</script>
-->
<div class="form">
<script src="js/edit_post.js"></script>
<form method="POST"  enctype="multipart/form-data" >
    <div class="login_form_container">
      <div class="login_form">
        <h2>Update Blog One...</h2>
        <div class="input_group">
        <input type="text" value='<?=$row['post_id']?>' name="id" hidden/>
          <!-- <i class="fa fa-user"></i> -->
          <!--name=" "--><input
            type="text"
            value='<?=$row['title']?>' name="title"
            placeholder="Title"
            class="input_text"
           
          />
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
        <div class="input_group">
          <!-- <i class="fa fa-unlock-alt"></i> -->

          <textarea  name="content" class="input_text textarea" placeholder="Enter Your Content...">
            <?=$row['content']?></textarea>
</div>
        <div class="input_group">
          <!-- <i class="fa fa-phone"></i> -->
          <img src="../uploads/<?=$row['banner']?>" alt="<?=$row['banner']?>" id="banner_img"/><br>
          <input
            type="file"
            name="banner"
            id="banner_file"
            class="input_text"
            required
          />

        </div>
        <div class="button_group" id="login_button">
        <input
            type="submit"
            name="update"
            value="Update"
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
</div>
</div></div>

<?php }}else{?><h1>No Blog Found</h1>
<?php
}
?>