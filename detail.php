<link rel="stylesheet" href="css/detail.css"/>
<style>
    </style>
    <?php
header("Content-Type: text/html");
?>

<?php
include('include/header.php');
include('include/navbar.php');
$id=$_GET['id'];
$sql="SELECT * FROM posts where post_id='$id'";

$result=$con->query($sql);
?><div class="detailpage">
    <div class="container">
<div class="row"><?php
if (!($con->error)) {
        while ($row = $result->fetch_assoc()) {
            $row['content']=htmlspecialchars_decode($row['content'],ENT_QUOTES);
            /*mysqli_query($con,"UPDATE TABLE posts set views=views+1 where post_id='$_GET["id"]'");*/
?>
<div class="d-flex  justify-content-center">
    <div class="col-10">
    <img src="./uploads/<?=$row['banner']?>" class="img-fluid" alt="image Loading...">
    </div>
        </div>

    <div class="col-12 col-md-8  details">
        <center>
            <a href='detail.php?id=<?=$row['id']?>'><p class="title"><?=$row['title']?></p></a>
            <hr>
        </center>
        <div class="d-flex justify-content-center">
            <table>
                <tr>
                    <td>
                    <h3 class="card-title   p-2">Technology <td>:</td>
        </td>
        <td>  <span class=" data"><?=$row['technology']?></span></h3></td>
        </tr>
        <tr>
                    <td>
                    <h3 class=" card-title p-2">Onwer <td>: &nbsp</td> 
        </td>
        <td>
        <span class=" data"><?=$row['email']?></span></h3>

        </td>
        </tr>
        <tr>
                    <td>
                    <h3 class=" card-title p-2">Posted at <td>: &nbsp</td> 
        </td>
        <td>
        <span class=" data"><?=$row['post_at']?></span></h3>

        </td>
        </tr>
        <tr>
                    <td>

        </td>
        <td>

        </td>
        </tr>
        <tr>
                    <td>

        </td>
        <td>

        </td>
        </tr>
        </table>  
        </div>
        &nbsp <p class="content">   &nbsp    &nbsp    &nbsp <?=$row['content']?></p>
    </div>
    
    <?php }
 }
 else{
    header('Refresh:0');
  }
 ?>
    <div class="col-9 col-md-3 onwer_blog">
        <h3 class=" title">Other from owner</h3>
        <hr>
        <?php
        $sql2="SELECT * FROM posts where post_id!='$id' and email=(SELECT email FROM posts where post_id='$id')";

        $result2=$con->query($sql2);
        if (!($con->error)) {
                while ($row2 = $result2->fetch_assoc()) {
                    ?>
                    <li><a class="card-title" href="detail.php?id=<?=$row2['post_id']?>"><?=$row2['title']?></a></li>
            
                    <?php
                }
            
                    
            }
        
        else{
          header('Refresh:0');
        }
?>
    </div>

</div>
</div>
    </div>
  
<?php
include('include/footer.php');
?>