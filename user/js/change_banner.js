const banner_file=document.getElementById('banner_file');
const banner_img=document.getElementById('banner_img');
banner_file.addEventListener('change',function(){
    console.log(banner_file);
    console.log("Image Changed");
    banner_img.src=URL.createObjectURL(banner_file.files[0]);
});