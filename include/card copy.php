<link rel="stylesheet" href="../css/card copy.css"/>
<style>
.author{
    float:right;
}
a{
    text-decoration:none;
}
.card-img-top{
min-width:30%;
  object-fit:cover;
  /* border-radius:10px 20px 30px 40px !important;
  */
} 
.btn{
  color:white !important;
  letter-spacing:2px;
  font-weight:400;

}
.btn:hover{
  letter-spacing:2px;
  font-weight:600;
}

.card-title{
  letter-spacing:3px;
  font-size:large;
  font-weight:900;
  color:blue;
  text-transform:capitalize;
  
  border-radius:0;
    
    

}
.card-title:hover{
  letter-spacing:5px;
cursor:pointer;
  border-radius:50px;
}
    </style>
    <div class="container">
      <div class="row">
   <?php 

$sql="SELECT u.name as 'onwer' ,p.title as 'title',p.banner as 'banner',p.technology as 'technology' 
,p.post_id as id ,p.content as 'content',p.post_at as 'data' from users u join posts p on u.email=p.email";

$result=$con->query($sql);
if (($con->error)) {
  ?><script>
  alert('Error: . <?=$sql?> <br>. <?=$con->errorFailed?>');</script>
  <?php
  die($con->errorFailed);
  }
  ?>
  <?php
  while ($row = $result->fetch_assoc()) {

?>
             
<div class="col-sm-6 col-md-4 col-lg-3 card">

  <img src="uploads/<?=$row['banner']?>" class="card-img-top " alt="../uploads/<?=$row['banner']?>">
  <div class="card-body">
  <form >
    
  <a href="detail.php?id=<?=$row['id']?>"><strong>
    <h4 class="card-title d-flex justify-content-center"><?=$row['title']?></h4></strong>
  </a>
    <b><p class="card-text mt-2 mb-4"><?=$row['technology']?></p></b>
    <div class=" mt-0 d-flex justify-content-around">
           
           <span>Posted at</span>
           <span class=" "></i>Onwed By</span>
    </div>
    <div class=" mt-0 d-flex justify-content-around">
           
           <span> <b class="onwer text-primary"><?=$row['data']?>   </b>
        </span>
           <span class="">
    <i class="text-danger fa fa-user-circle "></i>
            <b class="onwer text-primary"><?=$row['onwer']?>   </b>
          </span>
    </div>
    
    </form>
  </div>
</div>
<?php

  }

  ?>
  </div>
</div>