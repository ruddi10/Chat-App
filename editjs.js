function picchange()
{
    var file= this.files[0];
    if(file)
    {
        let filer= new FileReader();
        filer.addEventListener("load",function(){
            image.setAttribute("src",this.result);
        });
        filer.readAsDataURL(file);
    }
}


var inpfile= document.getElementById("file");
var image=document.getElementById("img");
inpfile.addEventListener("change",picchange)