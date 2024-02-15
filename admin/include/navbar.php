
<style>
.navbar-toggler-icon {
  font-family: 'Font Awesome 4.7';
  content: '\f0c9';
}

</style>
<link rel="stylesheet" href="css/navbar.css"/>
<?php
  $admin= $_SESSION['admin'];
  // $sql="SELECT * FROM users WHERE email='$email'";
  // $result=$con->query($sql);
  // $result=$result->fetch_assoc();
  $sql="SELECT count(*) as 'count' FROM posts";
  $res=$con->query($sql);
  $res=$res->fetch_assoc();
if (($con->error)) { 
                
  echo "<script>
  alert(' $con->error');</script>";
  header('Refresh:0');
          }
  
  ?>


<link rel="stylesheet" href="css/navbar.css"/>
<nav class="navbar navbar-expand-lg text-white" >
  <div class="container-fluid">
    <a class="navbar-brand" href="">Blog<span class="host">host</span></a>
    <button class="btn btn-sm navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon fa fa-user-signin">
        <i class="fa fa-user-signin"></i>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
      
      <li class="nav-item">
          <a class="nav-link active  " aria-current="page" href="user.php">Manage Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../" tabindex="-1" aria-disabled="true">Back as Guest</a>
        </li>
        <li class="nav-item">
          <a class=" nav-link" href="logout.php">Logout</a>
        </li>
        
          <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
       
      </ul>
      <form class="d-flex">
       <ul class="navbar-nav mr-2 mb-2 mb-lg-0 ">
       <li class="nav-item">
          <a class="nav-link active host " href="user" aria-current="page">Admin Panel</a>
        </li>
       <li class="nav-item">
          <a class="nav-link active" aria-current="page">H'i&nbsp<i class="host"><?=$admin?></i></a>
        </li>
       <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">H'i<?//=$result['name']?></a>
        </li> -->
   
          <li class="nav-item">
          <!-- <button type="button" class="btn btn-primary position-relative"> -->
          <a class="nav-link position-relative" href="">No of Posts<bold class=""></bold>
          
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger orange">
  <?=$res['count']?>

  </a>
          </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="1create.php">Add New Blog</a>
        </li> -->
      </ul>
      </form>
    </div>
  </div>
</nav>