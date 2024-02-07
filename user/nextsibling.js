var allFields=document.querySelectorAll(".form-input");
for(var i=0;i<allFields.length;i++){
    allFields[i].addEventListener('keypress',function(event){
        //event.preventDefault();
        if(event.keyCode===13){
            event.preventDefault();
            if(this.parentElement.nextElementSibling.querySelector('input')){
                this.parentElement.nextElementSibling.querySelector('input').focus();
            }
        }
    })
}
var filenameDisplay = document.getElementById('filenameDisplay');
var file_name='',file_type='';
filenameDisplay.innerHTML = 'No File Selected';
const inputElement = document.getElementById('banner');
inputElement.addEventListener('change',function(){
    //console.log(inputElement);
  //filenameDisplay = document.getElementById('filenameDisplay');
    file_name = inputElement.files[0].name;
    //alert(inputElement.files[0].name);
    file_type=inputElement.files[0].type.split('/').pop();
    //file_type=file_type.split('/').pop();
    filenameDisplay.textContent = `Selected file: ${file_name} and Type is ${file_type}`;
});
function validate(){
    //event.preventDefault();
    // let submit=false;
    // alert("submit="+submit);
    //return submit;
    const form = document.getElementById('form');
    const formData = new FormData(form);
    const name = formData.get('name');
    const email = formData.get('email');
    const password=formData.get('password');
    const phone=formData.get('phone');
    const  allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'];
    //const banner=formData.get('banner');
    //const inputElement = document.getElementById('banner');
    // const file = inputElement.files[0];
    // const filenameDisplay = document.getElementById('filenameDisplay');
    // const fullname = file.name;
    // const file_type=file.type.split('/').pop();
    // filenameDisplay.textContent = 'Selected file: ' + JSON.stringify(file_type)+file.name;
    // alert(JSON.stringify(banner));
    if(name.length<4 || name.length>10){
        alert("Name should be 4-10 characters.");
        return false;
    }
    if(email.length<6){
        alert("Email should be more than 6 characters.");
        return false;

    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email)){
alert("Email is not Valid");
return false;
    }
    const paswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
    if(!paswordRegex.test(password)) {
        alert("Password is not Valid");
        return false;
      }
    //filenameDisplay.textContent = 'Selected file: ' + JSON.stringify(file_type)+file.name;
    if(!file_type){
        alert("Image Field is Required");
        return false; 
    }
  if(!allowedImageExtensions.includes(file_type)){
    alert("File Format Not Support");
    return false;
  }
  return true;


    
    //   const regex = /^[6789]\d{9}$/; // Regular expression for 10-digit number starting with 6, 7, 8, or 9

    //   if (!regex.test(mobileNumber)) {}
}