<!-- <link rel="stylesheet" href="./include/table.css"/> -->
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

.technology,
.title {
    text-transform: capitalize;
}

.roll_no {
    width: 2%;
}

.title {
    /* 
    font-weight:800; */
    letter-spacing: 5px;
    width: 25%;
}

.technology {
    width: 10%;
}

.img_td {
    width: 38%;
}

.option_td {
    width: 17%;
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
@media screen and (max-width: 768px) {
    .img {
        /* width: 20vw ;
        max-height:20vh; */
    }
    .delete{
        margin-top:1rem;
    }
}
</style>
<script src="include/table.js"></script>

<?php
  $sql="SELECT * FROM posts join users on posts.email=users.email";
  $result=$con->query($sql);
if (!($con->error)) {
    $count = mysqli_num_rows($result);
    if($count>0){
      ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11 table-responsive">
            <table class="table ">
                <thead class="thead">
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Technology</th>
                        <th>Author</th>
                        <th>Banner</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <div class="container-fluid">
                        <div class="row"><?php
        $roll_no=1;
        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr class="justify-content-center">
                            
                                <form action="update.php" method="POST">
                                <input type="text" value="<?=$row['post_id']?>" name="id" hidden />
                                <td class="roll_no"><?=$roll_no?></td>
  
                                    <td class="title"><?=$row['title']?></td>
                                    <td class="technology"><?=$row['technology']?></td>
                                    <td>  <span>
                        <i class=" fa fa-user-circle text-warning"></i>
                        <b class="onwer "><?=$row['name']?></b></td>
                                    <td class="img_td"><img src="../uploads/<?=$row['banner']?>"
                                            class="card-img-top img img-fluid" alt="../uploads/<?=$row['banner']?>">
                                    </td>


                                    <td class="option_td"> <a class="author btn btn-secondary btn-sm "
                                            href="../detail.php?id=<?=$row['post_id']?>" target="_blank">
                                            <i class="fa fa-external-link"></i></a>
                                        <button type="submit" class="btn btn-sm btn-success btn-rounded "><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button"
                                            onclick="if (window.confirm('Are you sure you want to proceed?')) { window.location.href = 'http://localhost/blogapp/admin/include/delete_post.php?id=<?=$row['post_id']?>'; }"
                                            class="author btn btn-sm btn-danger btn-rounded delete"
                                >
                                            <i class="fa fa-trash"></i></button>
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