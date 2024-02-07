<link rel="stylesheet" href="../css/card.css"/>
<style>
    </style>
    <?php
    $email= $_SESSION['email'];
  $sql="SELECT * FROM posts WHERE email='$email'";
  $result=$con->query($sql);
if (!($con->error)) {
    $count = mysqli_num_rows($result);
    if($count>0){
      ?>
      <div class="container-fluid">
        <div class="row"><?php
        while ($row = $result->fetch_assoc()) {
                ?> 
                
<div class="col-sm-6 col-md-4 col-lg-3 card">
 
  <img src="../uploads/<?=$row['banner']?>" class="card-img-top " alt="../uploads/<?=$row['banner']?>">
  <div class="card-body">
  <form action="edit_post.php" method="POST">
    <strong>
      <h4 class="card-title d-flex justify-content-center"><?=$row['title']?></h4>
    </strong>
    <b><p class="card-text mt-2 mb-4"><?=$row['technology']?></p></b>
    <input type="text" value='<?=$row['post_id']?>' name="id" hidden/>
    <input type="text" value='<?=$row['email']?>' name="email" hidden/>
    <input type="text" value='<?=$row['title']?>' name="title" hidden/>
    <input type="text" value='<?=$row['technology']?>' name="technology" hidden/>
    <input type="text" value='<?=$row['banner']?>' name="banner" hidden/>
    <input type="text" value='<?=$row['content']?>' name="content" hidden/>
    <button type="submit" class="text-danger btn btn-success btn-rounded" 
    ><i class="fa fa-edit"></i>Edit</button>
    <a class="text-dark author btn btn-danger btn-rounded" href="include/delete_post.php?id=<?=$row['post_id']?>">
    <i class="fa fa-trash"></i>Delete</a>
    </form>
  </div>
</div>
<?php
          }
          ?>
</div>
      </div>
            
    <?php
    }
    else{
      ?>
      <h1>No Post Found</h1><?php
        echo "<script>
        alert('No Posts Found');</script>";
    }
   
    //header('Location: ./login.php');
  } else {
    echo "<script>
    alert(' $con->error');</script>";
    header('Refresh:0');
  }

