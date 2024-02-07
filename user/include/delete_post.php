
<script>
if(!confirm("Are You Sure to Delete")){
   
location.replace('http://localhost/blogapp/user/index.php');


}

</script>
<?php
include('../config/auth.php');
require('../../include/connect.php');
    $id=$_GET['id'];
    $email=$_SESSION['email'];
    $row=$_GET;
    $sql="DELETE  FROM posts WHERE email='$email' AND post_id='$id'";
  $result=$con->query($sql);
  $con->query("UPDATE users SET no_post=no_post-1 WHERE email='$email'");
if ($result->error) {
    ?>
    <script>
    alert($result->error);
       
    
    </script><?php
    
    }
    else{
?> <script>
alert("Blog Deleted Sussessfully");
   
</script><?php
        }
        header("Location:../");
        ?>