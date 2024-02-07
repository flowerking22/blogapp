<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
    <!--<style>
    body{
    background-color: #0c1022;
    color:orange;
}
.form{
    padding:1rem;
    border:1px solid skyblue;
    color:rgb(214, 227, 233) ;
    background-color: #0c1022;
    
}
</style> -->
</head>

<body>
    <div class="container">
        <!-- <h1 class="text-center">Responsive Form</h1> -->
        <div class="row justify-content-center">
            <form class=" form col-9 col-md-6">
                <div class=" ">
                    <label for="textInput" class="form-label">Text</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter text">
                </div>
                <div class=" ">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" placeholder="Enter email">
                </div>
                <div class=" ">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" placeholder="Enter password">
                </div>
                <div class=" ">
                    <label for="textareaInput" class="form-label">Textarea</label>
                    <textarea class="form-control" id="textareaInput" rows="3" style="height: 200px;"
                        placeholder="Content"></textarea>
                </div>
                <div class=" ">
                    <label for="fileInput" class="form-label">File</label>
                    <input type="file" class="form-control" id="fileInput" accept="image/jpeg, image/jpg, image/gif">
                    <img id="previewImage" src="#" alt="Preview" class="img-fluid mt-3 d-none">
                </div>
                <div class=" ">
                    <input type="submit" name="submit" class="btn btn-primary form-control" />
                </div>
            </form>
        </div>
    </div>

    <script>
    var allFields = document.querySelectorAll(".form-control");
    document.getElementById('name').focus();
    for (var i = 0; i < allFields.length; i++) {
        allFields[i].addEventListener('keypress', function(event) {
            //event.preventDefault();
            if (event.keyCode === 13) {
                event.preventDefault();
                if (this.parentElement.nextElementSibling.querySelector('input')) {
                    this.parentElement.nextElementSibling.querySelector('input').focus();
                }
            }
        })
    }
    // JavaScript for image preview
    const fileInput = document.getElementById('fileInput');
    const previewImage = document.getElementById('previewImage');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                previewImage.src = event.target.result;
                previewImage.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        } else {
            previewImage.src = '';
            previewImage.classList.add('d-none');
        }
    });
    </script>
</body>

</html>