<style>

</style>
<link rel="stylesheet" href="css/card.css" />
<div class="row  g-4 py-5">
    <?php 

$sql="SELECT u.name as 'onwer' ,p.title as 'title',p.banner as 'banner',p.technology as 'technology' ,
p.post_id as id ,/*p.content as 'content',*/p.post_at as 'data' from users u join posts p on u.email=p.email
order by p.title";

$result=$con->query($sql);
if (($con->error)) {
  ?><script>
    alert('Error: . <?=$sql?> <br>. <?=$con->errorFailed?>');
    </script>
    <?php
  die($con->errorFailed);
  }
  ?>
    <?php
  while ($row = $result->fetch_assoc()) {

?>


    <div class="col-12 col-sm-6 col-md-4 mb-4 card">
        <div class="m-2">
            <div class=" d-flex justify-content-end">
                <div class=" "style="height:1.5rem;!important;">
                <span class="badge text-warning" >
                  <?=$row['technology']?>
                </span>
              </div>
            </div>
            <img src="./uploads/<?=$row['banner']?>" class="card-img-top image rounded"
                alt="./uploads/<?=$row['banner']?>">

            <div class=" justify-content-center">

                <a href='detail.php?id=<?=$row['id']?>'>
                    <h3 class=" d-flex justify-content-center">
                        <i class="card-title"><?=$row['title']?></i>
                    </h3>
                </a>

            </div>
            <div class="card-body">
                <div class=" mt-0 d-flex justify-content-around">

                    <span>Posted at</span>
                    <span class=" "></i>Posted By</span>
                </div>
                <div class="mb-2 mt-0 d-flex justify-content-around">

                    <b class="date"><?=$row['data']?></b>
                    <span>
                        <i class=" fa fa-user-circle "></i>
                        <b class="onwer "><?=$row['onwer']?> </b>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <?php
  }
  ?>
</div>