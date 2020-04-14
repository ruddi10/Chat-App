function validation(e){
    let f=0;
let inputs =document.querySelectorAll(".inputvalue");
inputs.forEach(input=>{
    if(!input.value)
    {
    input.style.border="2px solid red";
    f++;
    }
    else
    input.style.border="none";

    
});



if(f){
    e.preventDefault();
}
}



const form= document.querySelector(".myform");
form.addEventListener("submit",validation);