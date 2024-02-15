
<!-- <link rel="stylesheet" href="../css/index.css"/> -->
<style>
.host{
  color: orange !important ;
  background: linear-gradient(to right,#433c3c,#393b41,#292d44) !important;
  border-radius: 10px;
}
.admin{
  color: orange !important ;
  background: linear-gradient(to right,#433c3c,#393b41,#292d44) !important;
  border-radius: 10px;
}
select{
  background-color:#0c1022;
  padding:0px;
  /* border:2px solid white !important; */
  border-radius:7px;
  font-weight:medium;
  margin-left:1rem;
}
select:hover{
  color:orange;
}
form{
  display:flex;

  background-color:#0c1022 !important;
font-weight:bold;
}
input[type="submit"][name="search"] {
    /* Your styling properties here */
    background-color: #0c1022; /* Example background color */
    color: orange; /* Example text color */
    border: none; /* Example border */
    padding: 10px 20px; 
    cursor: pointer; 
    margin-left:1rem;
    letter-spacing:3px !important;
    /* border:2px solid orange !important; */
  border-radius:7px;
  font-weight:bold;
  
}

  </style>
  <?php
    $tech='';
  $sql="SELECT technology,count(*) as count from posts group by technology";
  $result=mysqli_query($con,$sql);
  $all_count=mysqli_fetch_array(mysqli_query($con,'SELECT COUNT(*) FROM posts'))[0];
  $tech=$_GET['tech']??"";

  ?>
<link rel="stylesheet" href="css/navbar.css"/>
<nav class="navbar navbar-expand-lg text-white" >
  <div class="container-fluid">
    <a class="navbar-brand" href="">Blog<span class="host">host</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 ">
      <form method="get" action="http://localhost/blogapp/">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Home</a>
        </li> -->
        <li class="nav-item">
          <span class="nav-link" style="font-weight:lighter;">Filter By Domains</span>
        </li>

        <li class="nav-item">
          <a class="nav-link" >
       
          <select name="tech" class="nav-link">
            <option value="" Selected>All(<?=$all_count?>)</option>
            <?php
while($row=mysqli_fetch_assoc($result)){
  ?>
  <option value="<?=$row['technology']?>"> <?=$row['technology']?>(<?=$row['count']?>)</option>
  <?php
}
            ?>

</select>
</a>

          </li>
        
        <li class="nav-item">
          <!-- <a class="nav-link " href="" tabindex="-1" aria-disabled="true"> -->
          <input type="submit" value ="Search" name="search" class="nav-link"/>
        <!-- </a> -->
        </li>
 

      </ul>
      <form class="d-flex">
       <ul class="navbar-nav mr-2 mb-2 mb-lg-0 ">
      
      
        <li class="nav-item">
          <a class="nav-link active host " href="user" aria-current="page">User Panel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active  " href="" aria-current="page"> | </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active admin" href="admin" aria-current="page">Admin Panel</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link active  " aria-current="page" href="user/register.php">New User</a>
        </li>
        <li class="nav-item">
          <a class=" nav-link" href="user/index.php">Login</a>
        </li> -->
        </form> 
      </ul>
      </form>
    </div>

  </div>
</nav>