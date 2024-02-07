<?php
include('config/auth.php');
require('include/header.php');
?>
<script>
var allFields = document.querySelectorAll(".form-control");
    document.getElementById('name').focus();
    for (var i = 0; i < allFields.length; i++) {
        allFields[i].addEventListener('keypress', function(event) {
           // event.preventDefault();
            if (event.keyCode === 13) {
                event.preventDefault();
                if (this.parentElement.nextElementSibling.querySelector('input')) {
                    this.parentElement.nextElementSibling.querySelector('input').focus();
                }
            }
        })
    }
    // const fileInput = document.getElementById('fileInput');
    // const previewImage = document.getElementById('previewImage');

    // fileInput.addEventListener('change', (event) => {
    //     const file = fileInput.files[0];
    //     if (file) {
    //         const reader = new FileReader();
    //         reader.onload = (event) => {
    //             previewImage.src = event.target.result;
    //             previewImage.classList.remove('d-none');
    //         };
    //         reader.readAsDataURL(file);
    //     } else {
    //         previewImage.src = '';
    //         previewImage.classList.add('d-none');
    //     }
    // });
    </script>
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
<script>
alert('Uploaded image file extension is not allowed.');
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
alert(<?=$sql?>);
</script>
<?php
  $con->query($sql);
  if (!($con->error)) {
    ?><script>
alert('New Post Created Successfully');
</script>
<?php
    $con->query("UPDATE users SET no_post=no_post+1 WHERE email='$email'");
    header('Location:index.php');
  } else {
    ?><script>
alert('Error: . <?=$sql?> <br>. <?=$con->errorFailed?>');
</script>
<?php
  }
  
}
?>

<!Doctype html>
<html>
<head><title>Add New Blog</title>
<link rel="stylesheet" href="css/newblog.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <form class=" form col-9 col-md-6"  method="POST" enctype="multipart/form-data" onsubmit="return false">
                <div class=" ">
                    <label for="textInput" class="form-label">Text</label>
                    <input type="text" name="title" placeholder="Enter Title here..."  class="form-control"
                        id="Title" >
                </div>
                <div class=" ">
                    <label for="" class="form-label">Domain</label>
                    <input type="text" class="form-control" id="" placeholder="Enter doman here..." maxlength=10>
                </div>
                <div class=" ">
                    <label for="textareaInput" class="form-label">Textarea</label>
                    <textarea class="form-control" id="textareaInput" rows="3"name="content" style="height: 200px;"
                        placeholder="Place Your Content here..."></textarea>
                </div>
                <div class=" ">
                    <label for="fileInput" class="form-label">File</label>
                    <input type="file" class="form-control" id="banner_file" name="banner_file" accept="image/jpeg, image/jpg, image/gif">
                    <img id="banner_img" alt="Preview" class="img-fluid mt-3 d-none" name="banner_img" >
                </div>
                <div class=" ">
                    <input type="submit" name="submit" value="Add" class="btn btn-primary form-control" />
                </div>
            </form>
        </div>
</div>

    <script src="js/changetypepass.js"></script>
<script src="js/chang_banner.js" defer></script>
    <script src="js/newblog.js" defer></script>
    <script>
        
    const banner_file=document.getElementById('banner_file');
const banner_img=document.getElementById('banner_img');
banner_file.addEventListener('change',function(){
    console.log(banner_file);
    console.log("Image Changed");
    banner_img.src=URL.createObjectURL(banner_file.files[0]);
});
</script>
</body>
</html>