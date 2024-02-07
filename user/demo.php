<script src="nextsibling.js" defer></script>
<form  method="POST" enctype="multipart/form-data" id="form" action="check.php" onsubmit="return validate()" autocomplete="off">
    <div class="login_form_container">  
        <div class="login_form">
            <h2>Create New One...</h2>
            <div class="input_group">
                <input type="text" name="name" placeholder="name" class="input_text login_form form-input" />
            </div>
            <div class="input_group">
                <input type="text" name="email" placeholder="email" class="input_text login_form form-input" />
            </div>
            <div class="input_group">
                <input type="text" name="password" placeholder="password" class="input_text login_form form-input" />
            </div>
            <div class="input_group">
                <input type="text" name="phone" placeholder="Phone" class="input_text login_form form-input" />
            </div>
            <div class="input_group">
                 <input type="file" name="banner" id="banner" class="input_text form-input" />
            </div>
<h1 id="filenameDisplay"></h1>
            <div class="button_group" id="login_button">
                <input type="submit" name="submit" value="Add" class="input_tex form-input submit"/>
            </div>
            <!-- <div class="fotter">
                <a href='index.php' class="nextpage">Not now</a>
            </div> -->
        </div>
    </div>
</form>
<!-- <script src="nextsibling.js" defer></script> -->
<script>
// var filenameDisplay = document.getElementById('filenameDisplay');
// var file_name,file_type;
// filenameDisplay.innerHTML = 'No File Selected';
// const inputElement = document.getElementById('banner');
// inputElement.addEventListener('change',function(){
//     //console.log(inputElement);
//   //filenameDisplay = document.getElementById('filenameDisplay');
//     file_name = inputElement.files[0].name;
//     //alert(inputElement.files[0].name);
//     file_type=inputElement.files[0].type.split('/').pop();
//     //file_type=file_type.split('/').pop();
//     filenameDisplay.textContent = `Selected file: ${file_name} and Type is ${file_type}`;
// });

    </script>