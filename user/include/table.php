<!-- <link rel="stylesheet" href="./include/table.css"/> -->
<style>
.container-fluid {
    background-color: #0c1022 !important;
    margin-bottom: 30px;
    overflow-x:hidden;
}

.table {
    letter-spacing: 2px;
    color: white;
    font-weight: 600;
    /* margin: 20px; */
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
    width: 30vw;
    /* height: 25vh; */
    /* object-fit: cover; */
    border-radius: 7%;
    margin-top: 1rem;
    max-height: 40vh;
    width: 40vw !important;
    height: 25vh !important;
    
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
    /* width: 17%; */
}

.btn {
    margin-right: 10px;
    padding: 7px;
}


.nopost {
    margin-top: 70px;
    margin-bottom: 60px;
    color: white;
}
table tr td[class="option_td"] button {
    /* margin-top:1rem; */
}
.option_td{
    /* display:block; */
}
.option_button{
    /* margin-top:1rem; */
}

</style>
<script src="include/table.js"></script>

<?php
    $email= $_SESSION['email'];
  $sql="SELECT * FROM posts WHERE email='$email'";
  $result=$con->query($sql);
if (!($con->error)) {
    $count = mysqli_num_rows($result);
    if($count>0){
      ?>
<div class="container-fluid ">
    <div class="row">
    <div class="d-flex justify-content-center">
        <div class="col-11 table-responsive">
            <table class=" table ">
                <thead class="thead">
                    <tr>
                        <th></th>
                        <th>title</th>
                        <th>Technology</th>
                        <th>Banner</th>
                        <th>OPTIONS</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    <div class="">
                        <div class=""><?php
        $roll_no=1;
        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr class="justify-content-center">

                                <form action="update.php" method="get">
<!-- 
                                    <form action="update.php?id=<=$row['post_id']?>" method="POST"> 
                                    <input type="text" value='<=$row['email']?>' name="email" hidden />
                                    <input type="text" value='<=$row['title']?>' name="title" hidden />
                                    <input type="text" value='<=$row['technology']?>' name="technology" hidden />
                                    <input type="text" value='<=$row['banner']?>' name="banner" hidden />
                                    <input type="text" value='<=$row['content']?>' name="content" hidden /> -->

                                    <input type="text" value="<?=$row['post_id']?>" name="id" hidden />
                                    <td class="roll_no"><?=$roll_no?></td>
                                    <td class="title"><?=$row['title']?></td>
                                    <td class="technology"><?=$row['technology']?></td>
                                    <td class="img_td"><img src="../uploads/<?=$row['banner']?>"
                                            class="card-img-top img img-fluid" alt="../uploads/<?=$row['banner']?>">
                                    </td>



                                    <td class="option_td">
                                        <div class="option_div">
                                        <!-- <button class="option_button"> -->
                                        <a class="author btn btn-secondary btn-sm "
                                            href="../detail.php?id=<?=$row['post_id']?>" target="_blank">
                                            <i class="fa fa-external-link"></i></a>
        <!-- </button> -->
                                        <button type="submit" class="btn btn-sm btn-success btn-rounded option_button"><i
                                                class="fa fa-edit"></i></button>
                                                <!-- <a href="update.php?id=<=$row['post_id']?>" class="btn btn-sm btn-success btn-rounded option_button"><i
                                                class="fa fa-edit"></i></a> -->
                                        <button type="button"
                                            onclick="if (window.confirm('Are you sure you want to proceed?')) { window.location.href = 'http://localhost/blogapp/user/include/delete_post.php?id=<?=$row['post_id']?>'; }"
                                            class="author btn btn-sm btn-danger btn-rounded option_button delete"
                                >
                                            <i class="fa fa-trash"></i></button>
                                    </td>
                                </form>
                                            </div>
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