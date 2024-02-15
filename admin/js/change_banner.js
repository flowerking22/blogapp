const banner_file=document.getElementById('banner_file');
const banner_img=document.getElementById('banner_img');
banner_file.filename="http://localhost/blogapp/uploads/image21-1.jpg";
banner_file.addEventListener('change',function(){
    console.log(banner_file);
    console.log("Image Changed");
    console.log(banner_file.files[0]);
    banner_img.src=URL.createObjectURL(banner_file.files[0]);
});