<!-- <link rel="stylesheet" href="./include/table.css"/> -->
<?php
include('config/auth.php');
include('include/header.php');
include('include/user_navbar.php');
?>
<style>
.container-fluid {
    background-color: #0c1022 !important;
    margin-bottom: 30px;
}

.table {
    letter-spacing: 2px;
    color: white;
    font-weight: 600;
    margin: 20px;
    border: none;
}


.tbody tr {

    background-color: #0c1022;

}

.tbody tr:hover {
    color: orange;

}

.tbody td {
    padding-left: 2vw;

}

.tbody tr td {
    margin-left: 20px !important;
}

.thead {

    margin: 0px;
    /* background-color:white; */
    color: orange;
    border-color: white;
    font-size: 20px;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 3px;
    /* padding:20px; */
}

.mr-2 {
    margin-left: 2vw;
}

.fa {
    padding: 0px;
}

.img {
    width: 40vw !important;
    height: 15vh !important;
    object-fit:cover;
    border-radius: 0% 2% 14% 0%;
    margin-top: 0.5rem;
}

td {
    justify-content: center;
    vertical-align: middle;
}

.email,
.name {
    text-transform: capitalize;
}

.roll_no {
    width: 2%;
}

.name {
    /* 
    font-weight:800; */
    letter-spacing: 5px;
    /* width: 25%; */
}

.email {
    /* width: 10%; */
}

.img_td {
    /* width: 38%; */
}

.option_td {
    /* width: 17%; */
}

.btn {
    margin-right: 10px;
    padding: 7px;
}

table {
    border: none !important;
}

.nopost {
    margin-top: 70px;
    margin-bottom: 60px;
    color: white;
}
</style>
<script src="include/table.js"></script>

<?php
  $sql="SELECT * FROM users ";
  $result=$con->query($sql);
if (!($con->error)) {
    $count = mysqli_num_rows($result);
    if($count>0){
      ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-11">
            <table class="table table-responsive">
                <thead class="thead">
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>No Of Post</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <div class="container-fluid">
                        <div class="row"><?php
        $roll_no=1;
        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr class="justify-content-center">
                            
                                <form action="" method="POST">
                                <td class="roll_no"><?=$roll_no?></td>
  
                                    <td class="name"><?=$row['name']?></td>
                                    <td class="email">    <i class="fa fa-envelope text-danger"></i><?=$row['email']?></td>
                                    <td class="email "> <i class="fa fa-phone text-success"></i><?=$row['phone']?></td>
                                    <td>  <span>
                    
                        <b class="onwer text-primary"><?=$row['no_post']?></b> Posts</td>
                        <td>  <span>
                    
                    <b class="onwer"><?=$row['created_at']?></b></td>

                                    <td class="option_td"> 
                                        <!-- <a class="author btn btn-secondary btn-sm "
                                            href="../detail.php?id=<//$row['no_post']?>" target="_blank">
                                            <i class="fa fa-external-link"></i></a>
                                        -->
                                        <button type="button"
                                            onclick="if (window.confirm('Are you sure you want to proceed?')) { window.location.href = 'http://localhost/blogapp/admin/include/delete_user.php?email=<?=$row['email']?>'; }"
                                            class="author btn btn-sm btn-danger btn-rounded "
                                >
                                            <i class="fa fa-remove"></i></button>
                                    </td>
                                </form>
                            </tr>

                            <?php
$roll_no=$roll_no+1;
    }
          ?>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
    }
    else{
      ?>

<div class="container-fluid ">
    <div class="row  ">
        <div class="nopost d-flex justify-content-center">
            <h1> Currently your had posted
                <i class="text-danger">0</i> Blogs here...
            </h1>
        </div>
    </div>
</div><?php
        // echo "<script>
        // alert('No Posts Found');</script>";
    }
   
    //header('Location: ./login.php');
  } else {
    echo "<script>
    alert(' $con->error');</script>";
    header('Refresh:0');
  }

?>
<?php
include('include/footer.php');
?>