
<?php
include('../config/auth.php');
require('../../include/connect.php');
    $email=$_GET['email'];
    $sql="DELETE  FROM posts WHERE email='$email'";
  $result=$con->query($sql);
  $sql="DELETE  FROM users WHERE email='$email'";
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