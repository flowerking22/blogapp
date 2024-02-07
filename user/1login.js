
function validate(){
    event.preventDefault();
    let submit=true;
    alert("submit="+submit);
    
    const form = document.getElementById('form');
    const formData = new FormData(form);
    const email = formData.get('email');
    const password= formData.get('password');
    
    // filenameDisplay.textContent = 'Selected file: ' + JSON.stringify(file_type)+file.name;
    // alert(JSON.stringify(banner));
    if(email.length<4 || email.length>100){
        alert("email should be 4-100 characters.");
        return false;
    }
    if(technology<3){
        alert("Technology SHould be more 3characters.");
        return false;

    }
    if(!password){
alert("Please Enter Password");
return false;
    }
    //filenameDisplay.textContent = 'Selected file: ' + JSON.stringify(file_type)+file.name;
    
  return true;
}