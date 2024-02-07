<?php
// include_once('config/auth.php');
require_once('include/header.php');
?>

<link rel="stylesheet" href="form.css">
<!-- <script src="js/add_post.js" ></script> -->
<div class="container">
    <!-- <h1 class="text-center">Responsive Form</h1> -->
    <div class="row justify-content-center">
        <form class=" form col-9 col-md-6" method="POST" action="" onsubmit="return validate()" >
            <div class=" ">
                <label for="textInput" class="form-label">Email</label>
                <input type="text" class="form-control" autocomplete="off" id="name" name="email" placeholder="Enter Blog email">
            </div>
            <div class=" ">
                <label for="emailInput" class="form-label">Password</label>
                <input type="text" class="form-control" id="emailInput" autocomplete="off" name="technology" placeholder="Enter Blog Type">
            </div>
         
            <!-- </div> -->
            <div class=" ">
                <input type="submit" name="submit" class="btn btn-primary form-control" />
            </div>
        </form>
    </div>
</div>
<script>

function validate(){
    event.preventDefault();
    let submit=true;
    alert("submit="+submit); 
    const form = document.getElementById('form');
    const formData = new FormData(form);
    const email = formData.get('email');
    const password= formData.get('password');
    if(email.length<4){
        alert("email should be 4-100 characters.");
        return false;
    }
    if(password.length<4){
        alert("Technology SHould be more 3characters.");
        return false;

    }
return true;
}
    </script>
<!-- <script src="js/next_input.js"></script>
<script src="js/change_banner.js"></script> -->