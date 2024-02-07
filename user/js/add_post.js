const  allowedImageExtensions = ['jpg', 'jpeg', 'png', 'gif','apng', 'svg', 'bmp','ico', 'png','ico'];
var file_name="",file_type="";
const inputElement = document.getElementById('banner_file');
inputElement.addEventListener('change',function(){
    file_name = inputElement.files[0].name;
    file_type=inputElement.files[0].type.split('/').pop();
})
    
function validate(){
    event.preventDefault();
    let submit=true;
    alert("submit="+submit);
    return submit;
    const form = document.getElementById('form');
    const formData = new FormData(form);
    const title = formData.get('title');
    const technology= formData.get('technology');
    const content=formData.get('content');
    
    // filenameDisplay.textContent = 'Selected file: ' + JSON.stringify(file_type)+file.name;
    // alert(JSON.stringify(banner));
    if(title.length<4 || title.length>100){
        alert("Title should be 4-100 characters.");
        return false;
    }
    if(technology<3){
        alert("Technology SHould be more 3characters.");
        return false;

    }
    if(!content){
alert("Please Enter Content");
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
}